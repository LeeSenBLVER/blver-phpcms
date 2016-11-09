CKEDITOR.plugins.add('insertcode',

{

 init: function(editor)

 {

   //这里是插件代码

   var pluginName = 'insertcode'; //插件名称

   CKEDITOR.dialog.add(pluginName, this.path + 'dialogs/insertcode.js'); //加载插件主程序

   editor.addCommand(pluginName, new CKEDITOR.dialogCommand(pluginName));

   editor.ui.addButton('insertcode',

     {

       label: '插入代码', //鼠标指向提示文字

       command: pluginName,

       icon: this.path + 'images/insertcode.png' //插件图标

     });

 }

});