<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{url('css/w3.css')}}">
    <link rel="stylesheet" href="{{url('css/scrollbar.css')}}">
    <title>child</title>
    <script src="{{url('Editor/dist/js/lib/jquery-1.10.2.min.js')}}"></script>
    <script>
        function childFunctionSend(content,time,picture) {
            document.getElementById('w3-container').innerHTML+= "<li class='w3-padding-16 w3-pale-yellow'><img class='w3-left w3-circle w3-margin-right' style='width:60px;height:60px;' src='http://webchat.joker1996.com/"+picture+"'><span>"+content+"</span><br><span>"+time+"</span></li>";
//           添加样式到div中的ul

            window.scrollTo(0,document.body.scrollHeight);
//            让浏览器的滚动条每次都到最底端

        }
        function childFunctionGet(content,time,picture) {
            document.getElementById('w3-container').innerHTML+= "<li class='w3-padding-16 w3-sand'><img class='w3-left w3-circle w3-margin-right' style='width:60px;height:60px;' src='http://webchat.joker1996.com/"+picture+"'><span>"+content+"</span><br><span>"+time+"</span></li>";
//           添加样式到div中的ul
            window.scrollTo(0,document.body.scrollHeight);
//            让浏览器的滚动条每次都到最底端
        }


    </script>
</head>
<body>
<div>
    <ul id="w3-container" class="w3-ul w3-light-grey w3-card-4">

    </ul>

</div>
</body>
</html>