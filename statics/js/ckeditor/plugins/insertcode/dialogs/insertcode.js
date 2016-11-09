CKEDITOR.dialog.add('insertcode', function(a){
    var b = a.config;
    var escape = function( str ){
        //给数组原型上添加一个函数，用于判断字符串在不在数组中
        Array.prototype.exist = function(v) {
            for(k=0;k<this.length;k++) {
                if(this[k].toLowerCase() == v.toLowerCase())
                    return true;
            }
            return false;
        }
        //HTML标签符号
        var operator = "><=,()[].+-*&/!|^~?{};:";
        //定义关键字数组，可根据需要添加
        var keyword  = ['and','or','__FILE__','exception','__LINE__','array','as','break','case','class','const',
                'continue','declare','default','die','do','echo','else','elseif','empty','enddeclare','endfor',
                'endforeach','endif','endswitch','endwhile','eval','exit','extends','for','foreach','function',
                'global','if','include','include_once','isset','list','new','old_function','print','require',
                'require_once','return', 'static','switch','unset','var','while','__FUNCTION__','__CLASS__',
                '__METHOD__','true','false','null'];
        var inString = false;//定义字符串控制器
        var inSLComment = false; //d单行注释
        var inMLComment = false; //多行注释
        var delimiter = null; //用于记录单引号和双引号开始,以查找结束引号
        var startPos = null;//记录每小段字符串中单字母的位置
        var word  = "";//组装每一个单词
        var res = "";//连接整段插入的字符串
        var funs = '';//定义函数
        //开始格式
        for(i=0;i<str.length;i++) {
            if( inString ) { //如果在字符串
                //这个词不为空
                if(word != "") {
                    if( keyword.exist(word)) {//如果这个词在关键字词组内
                        res+= rendColor(word, 'keyword');
                    } else {
                        res+= word;
                    }
                    word = "";
                }
               
                fromPos = startPos+1;
                while(1) {
                    //查找当前字符串的结束
                    p = str.indexOf( delimiter, fromPos );
                    //得到整个代码
                    if( p == -1 ) {
                        curstr = str.substr(startPos);
                        res += rendColor( curstr, 'string' );
                        i = str.length;
                        break;
                    }
                    if( p != -1 && str.charAt(p-1) != "//" ) {//取具体位置字符
                        i = p+1;
                        curstr  = str.substring(startPos, i ); //取得当前字符串
                        res += rendColor( curstr, 'string' ); //配置颜色样式并连接到结果
                        inString = false; //去除这个记录
                        startPos = null;
                        break;
                    } else {
                        fromPos = p+1;
                    }
                }
            }
            if( inSLComment ) {//判断是否是单行注释
                if(word != "") {//如果有关键字
                    if( keyword.exist(word) ) //是否php关键字
                        res+= rendColor(word, 'keyword');//rendColor执行添加颜色
                    else
                        res+= word;
                    word = "";
                }
                p = str.indexOf( "\n", i );
                if( p != -1 ) {//行结束
                    i = p;
                    curstr = str.substring( startPos, p );
                    res += rendColor( curstr, 'comment' );
                    startPos = null;
                    inSLComment = false;
                } else {
                    curstr = str.substr( startPos );
                    res += rendColor( curstr, 'comment' );
                    i = str.length;
                }
            }
            if( inMLComment ) {//如果在单行注释
                if(word != "") {
                    if( keyword.exist(word))
                        res+= rendColor(word, 'keyword');
                    else
                        res+= word;
                    word = "";
                }
                p = str.indexOf( "*/", startPos+2 );
                if( p != -1 ) {//如果是行结束
                    i = p+2;
                    curstr = str.substring(startPos, i );
                    res += rendColor( curstr, 'comment' );
                    startPos = null;
                    inMLComment = false;
                } else {
                    curstr = str.substr( startPos );
                    res += rendColor( curstr, 'comment' );
                    i = str.length;
                }
            }
            var c  = str.charAt(i); //当前字符
            var nc = str.charAt(i+1);//下一个字符
            switch( c ) {
                case '/':
                    if( nc == '*' ) {//去掉多行注释
                        inMLComment = true;
                        startPos = i;
                    } else if( nc == "/" ) {//单行注释
                        inSLComment = true;
                        startPos = i;
                    } else {
                        if(word != "") {
                            if( keyword.exist(word) ) {
                                res+= rendColor(word, 'keyword');
                            } else {
                                res+= word;
                            }
                            word = "";
                        }
                        res += rendColor(c, 'operator' );
                    }
                    break;
                case '$':
                    if( /^[a-zA-Z_]+/.test(nc)) {
                        funs += '$';
                    } else {
                        res += c;
                    }
                    break;
                case '#':
                    inSLComment = true;
                    startPos = i;
                    break;
                case '"':
                    inString = true;
                    delimiter = '"';
                    startPos = i;
                    break;
                case "'":
                    inString = true;
                    delimiter = "'";
                    startPos = i;
                    break;
                default:
                    if( /[\$w]/.test(c)) { //关键字只包含常见的字符
                        if( funs != '') {
                            funs += c;
                        } else {
                            word += c;   //缓存当前字符
                        }
                    } else {
                        res += rendColor(funs,'functions');
                        funs = '';
                        if(word != "") {
                            if( keyword.exist(word) ) {
                                res+= rendColor(word, 'keyword');
                            } else {
                                res+= word;
                            }
                            word = "";
                        }
                        //处理不常见的字符
                        if( operator.indexOf(c) != -1 ) //是一个操作符
                            res += rendColor(c, 'operator' );
                        else if(/[\n]/.test(c)) //处理换行添加li标签
                            res += '</li>\n<li>';
                        else if(/[\t]/.test(c)) //一个制表符替换为四个空格
                            res += '    ';
                        else if(/[\s]/.test(c)) //其他空字符替换为一个空格
                            res += ' ';
                        else
                            res += c;
                    }
                    break;
            }
        }
        return res;
    }
    //对字符串中的HTML代码编码
    function HTMLEncode( str ) {
        str = str.replace(/&/g, '&');
        str = str.replace(/</g, '<');
        str = str.replace(/>/g, '>');
        return str;
    }
    //根据字符串所属类型渲染不同的着色
    function rendColor( str, type ) {
        var functionColor = "#FF8000";//函数颜色
        var commentColor = "#8EB2C1";//注释
        var stringColor  = "#DD0000";//字符串，常量
        var operatorColor= "#0059CF";//(){}=
        var keywordColor = "#007700";//关键字，可在上面自己增加
        var commonColor  = "#0000BB";//普通
        var useColor  = null;
        str = HTMLEncode( str );
 
        //分配颜色
        switch( type ) {
            case 'comment':
                useColor  = commentColor;
                break;
            case 'functions':
                useColor  = functionColor;
                break;
            case 'string':
                useColor = stringColor;
                break;
            case 'operator':
                useColor  = operatorColor;
                break;
            case 'keyword':
                useColor  = keywordColor;
                break;
            default:
                useColor  = commonColor;
                break;
        }
        if( str.indexOf("\n") != -1 ) {
            str = str.replace(/\n/g,'</li><li>');//这四行是为了处理多行注释的缩进和添加li标签
            str = str.replace(/\t/g,'    ');
            str = str.replace(/\s/g,' ');
            arr = str.split("</li><li>");
            for(j=0;j<arr.length;j++) {
                arr[j] = "<span style='color:"+ useColor +"'>"+ arr[j] + "</span>";
            }
            return arr.join("</li><li>");
        } else {
            str = "<span style='color:"+ useColor +"'>"+ str + "</span>";
            return str;
        }
    };
    //创建一个随机字符串，用于多段代码中的ol标签的id不重复，复制代码的js用
    var chars = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    function getrandid() {
        var res = '';
        for(var i = 0; i<3; i++) {
            var id = Math.ceil(Math.random()*24);
            res += chars[id];
        }
        return res;
    }
 
        //这里是主要的
    return {
        title: '插入代码',//弹出的窗体标题
        resizable: CKEDITOR.DIALOG_RESIZE_BOTH,//窗体类型
        minWidth: 350,//最小宽高
                minHeight: 300,
        contents: [{
          id: 'info',//父元素id
                    label: '常规',
                    title: '插入代码',
                    elements:[{
                        type: 'textarea',//表单类型
                        widths : [ '100%', '100%' ],
                        label: '请输入要插入的代码',
                        id: 'code',//子元素id
                        rows: 15,
                        'default': ''
                       }]
                    }],
        onOk: function(){//点击确定执行
            code = this.getValueOf('info', 'code');//取得插入的代码
                        id = getrandid();//获得一个随机id
            html = '' + escape(code) + '';//执行最上面的函数，加色,转换标签等
            a.insertHtml("<div class=\"insertcode\"><ol id=\"code_" + id + "\"><li>" + html + "</li></ol></div><br/>");//插入到页面
       },
        onLoad: function(){
        }
    };
});