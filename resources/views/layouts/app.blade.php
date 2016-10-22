<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

<!-- Compiled and minified CSS -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }
        body,html{
    height: 100%;
  }

        .fa-btn {
            margin-right: 6px;
        }
        .pad-l-10{
            padding-left:10px !important;
        }.bg-gray{
            background: #000000;
            box-shadow:  0px 0px 5px 1px #ccc;
        }
        
        .text-white{
            color: white!important;
        }

  nav.sidebar, .main{
    -webkit-transition: margin 200ms ease-out;
      -moz-transition: margin 200ms ease-out;
      -o-transition: margin 200ms ease-out;
      transition: margin 200ms ease-out;
  }

  .main{
    padding: 10px 10px 0 10px;
  }

 @media (min-width: 765px) {

    .main{
      position: absolute;
      width: calc(100% - 40px); 
      margin-left: 40px;
      float: right;
    }

    nav.sidebar:hover + .main{
      margin-left: 200px;
    }

    nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
      margin-left: 0px;
    }

    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
      text-align: center;
      width: 100%;
      margin-left: 0px;
    }
    
    nav.sidebar a{
      padding-right: 13px;
    }

    nav.sidebar .navbar-nav > li:first-child{
      border-top: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav > li{
      border-bottom: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav .open .dropdown-menu {
      position: static;
      float: none;
      width: auto;
      margin-top: 0;
      background-color: transparent;
      border: 0;
      -webkit-box-shadow: none;
      box-shadow: none;
    }
.big-size{
    padding-top: 30px;
    padding-left: 60px;
    /*padding-top: 30px;*/
    font-size: 180px;
}
    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
      padding: 0 0px 0 0px;
    }

    .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
      color: #777;
    }

    nav.sidebar{
      width: 200px;
      height: 100%;
      margin-left: -160px;
      float: left;
      margin-bottom: 0px;
    }

    nav.sidebar li {
      width: 100%;
    }

    nav.sidebar:hover{
      margin-left: 0px;
    }

    .forAnimate{
      opacity: 0;
    }
  }
   
   .card {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
  height: 300px;
  margin: 1rem;
  width: 45%;
  margin-left: 20px;
}

.card-1 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.card-1:hover {
  box-shadow: 0 8px 16px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);

}
.bg-l-green{
    background: #008080;
}
.bg-l-purple{
    background: #800080;
}


  @media (min-width: 1330px) {

    .main{
      width: calc(100% - 200px);
      margin-left: 200px;
    }

    nav.sidebar{
      margin-left: 0px;
      float: left;
    }

    nav.sidebar .forAnimate{
      opacity: 1;
    }
  }

  nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
    color: #CCC;
    background-color: transparent;
  }

  nav:hover .forAnimate{
    opacity: 1;
  }
  section{
    padding-left: 15px;
  }
  .navbar-header a:hover{
    color:black!important;
  }
  
 
    </style>
</head>
<body id="app-layout">
     <nav class="navbar bg-gray text-white">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-white" href="#">Exam System</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right text-white">
      <li><a href="/logout" class="text-white" ><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
    </ul>
  </div>
</nav>
      
      <nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li {{ Request::is('home') ? ' class=active' : 'download' }} ><a href="/home">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown {{ Request::is('account') ? 'active' : null }}" >
          <a href="/account" class="dropdown-toggle " data-toggle="dropdown">My Account <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="#">Edit </a></li>
          </ul>
        </li>           
        <li {{ Request::is('exam/index') ? ' class=active' : null }}  ><a href="/exam/index">Exams<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
        <li ><a href="/subject/index">Subjects<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a></li>

        <li {{ Request::is('result/index') ? ' class=active' : null }}><a href="/result/index">Results<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
      </ul>
    </div>
  </div>
</nav>    
    
        @yield('content')

<!-- Modal -->
<div id="myModal" class="modal fade" style="margin-top:100px;" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Embed code for this Exam</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <label class="col-sm-2">height</label>  
          <div class="col-sm-3"><input type="number" min="500" value="500" class="corm-control" id="_h"></div>  
          <label class="col-sm-2">width</label>  
          <div class="col-sm-3"><input type="text" readonly="" disabled="" value="100%" class="corm-control"></div>  
        </div>
      <br>
        <textarea id="codearea" rows="5" class="form-control col-md-12" readonly="" >
        </textarea>

      </div>

      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
     
  <!-- Compiled and minified JavaScript -->
  
          
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript">
      var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(a){var c,d,e,f,g,h,i,b="",j=0;for(a=Base64._utf8_encode(a);j<a.length;)c=a.charCodeAt(j++),d=a.charCodeAt(j++),e=a.charCodeAt(j++),f=c>>2,g=(3&c)<<4|d>>4,h=(15&d)<<2|e>>6,i=63&e,isNaN(d)?h=i=64:isNaN(e)&&(i=64),b=b+this._keyStr.charAt(f)+this._keyStr.charAt(g)+this._keyStr.charAt(h)+this._keyStr.charAt(i);return b},decode:function(a){var c,d,e,f,g,h,i,b="",j=0;for(a=a.replace(/[^A-Za-z0-9\+\/\=]/g,"");j<a.length;)f=this._keyStr.indexOf(a.charAt(j++)),g=this._keyStr.indexOf(a.charAt(j++)),h=this._keyStr.indexOf(a.charAt(j++)),i=this._keyStr.indexOf(a.charAt(j++)),c=f<<2|g>>4,d=(15&g)<<4|h>>2,e=(3&h)<<6|i,b+=String.fromCharCode(c),64!=h&&(b+=String.fromCharCode(d)),64!=i&&(b+=String.fromCharCode(e));return b=Base64._utf8_decode(b)},_utf8_encode:function(a){a=a.replace(/\r\n/g,"\n");for(var b="",c=0;c<a.length;c++){var d=a.charCodeAt(c);d<128?b+=String.fromCharCode(d):d>127&&d<2048?(b+=String.fromCharCode(d>>6|192),b+=String.fromCharCode(63&d|128)):(b+=String.fromCharCode(d>>12|224),b+=String.fromCharCode(d>>6&63|128),b+=String.fromCharCode(63&d|128))}return b},_utf8_decode:function(a){for(var b="",c=0,d=c1=c2=0;c<a.length;)d=a.charCodeAt(c),d<128?(b+=String.fromCharCode(d),c++):d>191&&d<224?(c2=a.charCodeAt(c+1),b+=String.fromCharCode((31&d)<<6|63&c2),c+=2):(c2=a.charCodeAt(c+1),c3=a.charCodeAt(c+2),b+=String.fromCharCode((15&d)<<12|(63&c2)<<6|63&c3),c+=3);return b}};
    </script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
       $('.mod_open').click(function () {
           var ref = $(this).attr('data-ref');
            Exam = Base64.encode( Base64.encode(ref+"|"+ Date.now()) );

           $("#codearea").val('<iframe id="_form_frame" style="width:100%;height:500px;border:0px" src="http://lms.dev/mcqexam/getref/'+Exam+'"  height="500px"></iframe><script>(function(){var confirmOnPageExit=function(){return "This is a demo version of easyT. Leaving or refreshing window will reset your exam progress. Are you sure?";};window.onbeforeunload =confirmOnPageExit})();<\/script>');
           $("#myModal").modal();
       });

       $("#_h").change(function(){
          $("#codearea").val('<iframe id="_form_frame" style="width:100%;height:'+$(this).val()+'px;border:0px" height="'+$(this).val()+'px" src="http://lms.dev/mcqexam/getref/'+Exam+'"></iframe><script>(function(){var confirmOnPageExit=function(){return "This is a demo version of easyT. Leaving or refreshing window will reset your exam progress. Are you sure?";};window.onbeforeunload =confirmOnPageExit})();<\/script>');
       })
    });
</script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('table').DataTable();
            $('select').addClass('form-control');
            $('input').addClass('form-control');
        });


    </script>
</body>
</html>
