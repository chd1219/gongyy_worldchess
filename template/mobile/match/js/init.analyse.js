var ws = null;
var wstest = null;
function initWebsocket(){
    var wsImpl = window.WebSocket || window.MozWebSocket;
    // create a new websocket and connect
    window.ws = new ReconnectingWebSocket('ws://114.55.174.231:9001/');
    //window.ws = new ReconnectingWebSocket('ws://120.55.37.210:9001/');
    // when data is comming from the server, this metod is called
    ws.onmessage = function (evt) {

        play.ParseMsg(evt.data);    
    }
    // when the connection is established, this method is called
    ws.onopen = function () {
        heartCheck.start();
    }
    // when the connection is closed, this method is called
    ws.onclose = function () {
        //showFloatTip("服务断开，请重试！");
    }       
    // when the connection is error, this method is called
    ws.onerror = function () {
        //showFloatTip("服务断开，请重试！");
    }   
}
function initTestWebsocket(url){
	var wsImpl = window.WebSocket || window.MozWebSocket;
	window.wstest = new ReconnectingWebSocket(url);
	wstest.onmessage = function (evt) {

	}
	wstest.onopen = function () {

	}
	wstest.onclose = function () {
 		console.log("wstest服务断开，请重试！");
	}		

	wstest.onerror = function () {
		console.log("wstest服务断开，请重试！");
	}	
}
function sendMessage(e){
	if(!ws) return;
	ws.send(e);
	if(!wstest) return;
	wstest.send(e);
}
function loadConfig() {
     if(!analysedata){
    comm.initChess(comm.initMap);
	bill.create();	
    
    }else {
        showFloatTip("We have targeted for your last exit position");
        __getChessData(analysedata);
    }
    initWebsocket();
}
function initLayer(e) {
    initCanvas(e);
    onload(),
    loadConfig()    
}
function analyse() {
    isanalyse ?  (showFloatTip("关闭分析模式"), isanalyse = 0 , bill.cleanLine()) : (checkautoplay());
}
function checkautoplay (){
    showFloatTip("开启分析模式");
    isanalyse = 1;
    if(b_autoset){
        bill.bPlay();
        if($("#blackautoplayTog").hasClass('mui-active')){
            $("#blackautoplayTog").removeClass('mui-active');
            $("#blackautoplayTog").html('<div class="mui-switch-handle"></div>');
        }
    }
    if(r_autoset){
        bill.rPlay();
        if($("#redautoplayTog").hasClass('mui-active')){
            $("#redautoplayTog").removeClass('mui-active');
            $("#redautoplayTog").html('<div class="mui-switch-handle"></div>');
        }
    }
    bill.replayBtnUpdate();
}
onload = function() {
    comm.dot = {
        dots: []
    },
    comm.mans = {},
	
    $("#isOffensiveBtn").on('tap',bill.offensive),
    $("#analyseBtn").on('tap',analyse),
    $("#blackautoplayBtn").on('tap',bill.bPlay),
    $("#redautoplayBtn").on('tap',bill.rPlay),
    $("#soundBtn").on('tap',bill.sound),
    $("#switchBtn").on('tap',bill.switch),
    $("#verticalreverseBtn").on('tap',bill.reverse),    
    $("#noteBtn").on('tap',bill.note),  
    $("#editboardBtn").on('tap',bill.editboard),  
    $("#firstBtn").on('tap',bill.replayFirst),
    $("#autoreplayBtn").on('tap',bill.autoreplay),
    $("#prevBtn").on('tap',bill.replayPrev),
    $("#nextBtn").on('tap',bill.replayNext),
    $("#endBtn").on('tap',bill.replayEnd),
    $("#regretBtn").on('tap',bill.regret),
    $("#sendBtn").on('tap',bill.send),
    $("#fullBtn").on('tap',bill.fullBroad),
    $("#clearBtn").on('tap',bill.cleanBroad),               
    $("#saveBtn").on('tap',bill.save);      
};
var __getChessData = function(e) {
    serverData = e;
    if(serverData.BillType){
        comm.initChess(comm.emptyMap);
        bill.resizeCanvas();
        createbroad = !1;
        bill.cMap = parsemap(serverData.cMap); 
        play.cMap = bill.cMap;
        comm.init();
        bill.init(3, comm.parseMap(serverData.map), !0);
        play.map = bill.map;
        var move = comm.parseMovesEx(serverData.moves);
        id = parseInt(serverData.id),currentId = parseInt(serverData.currentId),movesIndex = bill.paceEx.length;
        if(typeof(serverData.preid) != "undefined")preid= parseInt(serverData.preid);
        if(typeof(serverData.nextid) != "undefined")nextid= parseInt(serverData.nextid);
        bill.getMoves4Server();
        comm.parseNote(serverData.notes);
        r_autoset = parseInt(serverData.r_autoset);
        b_autoset = parseInt(serverData.b_autoset);
        bill.my=parseInt(serverData.bmy),play.my=parseInt(serverData.pmy);
        voicemode = parseInt(serverData.voicemode);
        if(r_autoset!=0){$('#redautoplayTog').addClass('mui-active'),r_autoset=0,bill.rPlay();}
        if(b_autoset!=0){$('#blackautoplayTog').addClass('mui-active'),b_autoset=0,bill.bPlay();}
        bill.isOffensive = serverData.isOffensive,isOffensive = serverData.isOffensive;
        isVerticalReverse = parseInt(serverData.isVerticalReverse);
        isanalyse = parseInt(serverData.isanalyse);
        if(isanalyse){$('#analyseTog').addClass('mui-active')}
        if(!isOffensive){$('#isOffensiveTog').addClass('mui-active')}   
        voicemode?$('#soundTog').addClass('mui-active'):$('#soundTog').removeClass('mui-active');
        if(isVerticalReverse){$('#verticalreverseTog').addClass('mui-active')}
        bill.replayBtnUpdate();
    }        
}
