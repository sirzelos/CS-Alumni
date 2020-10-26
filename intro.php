<!DOCTYPE html>
<html>
  <head>
    <title>Welcome to Intro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body, figure, a, div {
        margin: 0;
        padding: 0;
        -ms-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        border-color: inherit;
        /* font */
        font-family: 'Kanit', sans-serif;
      }
      html, body {
        /* สีพื้นหลัง */
        background-color: rgb(0, 0, 0);
        overflow: hidden;
        position: relative;
        width: 100%;
        height: 100%;
      }
      figure a {
        width: 100%;
        height: 100%;
        float: left;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-width: 1px;
        border-style: solid;
        -webkit-transition: all 1s ease-out;
        -moz-transition: all 1s ease-out;
        -ms-transition: all 1s ease-out;
        transition: all 1s ease-out;
        /* ถ้ามีการเปลี่ยนขนาดของรูปภาพ เปลี่ยนตัวเลข 100 เป็นครึ่งหนึ่งของขนาดรูปภาพด้วย */
        box-shadow: 0 0 100px 100px rgba(0,0,0,0.7) inset;
        -moz-box-shadow: 0 0 100px 100px rgba(0,0,0,0.7) inset;
        -webkit-box-shadow: 0 0 100px 100px rgba(0,0,0,0.7) inset;
        
      }
      figure a:hover {
        box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
        -webkit-box-shadow: none;
      }
      figure {
        float: left;
        display: inline-block;
      }
      #warper {
        position: relative;
        overflow: hidden;
        border-width: 1px;
        border-style: solid;
        /* สีกรอบรูป */
        border-color: #000;
      }
      .preview {
        left: 0;
        top: 0;
        width: 0;
        height: 0;
        position: fixed;
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        -webkit-transition: all 0.5s ease-out;
        -moz-transition: all 0.5s ease-out;
        -ms-transition: all 0.5s ease-out;
        transition: all 0.5s ease-out;
      }
      /* ข้อความลิงค์ไปหน้าหลัก */
      .next {
        z-index: 1;
        color: #FFF;
        position: absolute;
        right: 2em;
        bottom: 2em;
        font-size: 2em;
        text-decoration: none;
        background-color: rgba(0,0,0,0.2);
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        padding: 0.5em 1em;
        -webkit-transition: background-color 0.5s ease-out;
        -moz-transition: background-color 0.5s ease-out;
        -ms-transition: background-color 0.5s ease-out;
        transition: background-color 0.5s ease-out;
        color: white;
      }
      .next:hover {
        background-color: rgba(0,0,0,0.);
      }
      /* iphone and small device */
      @media only screen and (max-width: 480px) {
        .next {
          right: 10px;
          bottom: 10px;
          font-size: 1.5em;
        }
      }
    </style>
  </head>
  <body>
    <div id="body">
      <div id="warper">
        <figure><a style="background-image:url(img_intro/0.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/1.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/2.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/3.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/4.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/5.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/6.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/7.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/8.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/9.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/10.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/11.jpg)"></a></figure>
        <figure><a style="background-image:url(img_intro/12.jpg)"></a></figure>

       
       
      </div>
    </div>
    <a class=next href="login/checkid.php">เข้าสู่เว็บไซต์...</a>
    <script src="gajax.js"></script>
    <script>
      /* ขนาดรูปเล็กสูงสุด */
      var thumb_width = 200;
      /* จำนวนแถวของรูปภาพ */
      var rows = 2;
      /* slide show */
      var drag = false,
        warper = $G('warper'),
        images = warper.elems('a'),
        cols = Math.floor(images.length / rows),
        figure_height = (100 / rows) + '%',
        figure_width = (100 / cols) + '%',
        ch = document.viewport.getHeight(),
        cw = document.viewport.getWidth(),
        w = (thumb_width * cols) * ch / (thumb_width * rows);
      warper.style.height = ch + 'px';
      warper.style.width = w + 'px';
      warper.style.left = ((cw - w) / 2) + 'px';
      var preview = $G(document.body).create('div');
      preview.className = 'preview';
      preview.style.left = (cw / 2) + 'px';
      preview.style.top = (ch / 2) + 'px';
      preview.setStyle('opacity', 0);
      forEach(warper.elems('figure'), function () {
        this.style.height = figure_height;
        this.style.width = figure_width;
      });
      preview.addEvent("mouseup", function (e) {
        this.style.left = (cw / 2) + 'px';
        this.style.top = (ch / 2) + 'px';
        this.style.width = 0;
        this.style.height = 0;
        preview.setStyle('opacity', 0);
      });
      var doClick = function (e) {
        if (!drag) {
          var hs = /url\(["'"](.*)["'"]\)/.exec(this.getStyle('backgroundImage'));
          if (hs) {
            preview.setStyle('backgroundImage', 'url(' + hs[1] + ')');
            preview.style.left = 0;
            preview.style.top = 0;
            preview.style.width = cw + 'px';
            preview.style.height = ch + 'px';
            preview.setStyle('opacity', 1);
          }
        }
      };
      forEach(images, function () {
        $G(this).addEvent("mouseup", doClick);
      });
      new GDragMove('warper', 'body', {
        moveDrag: function () {
          drag = true;
          return true;
        },
        endDrag: function () {
          drag = false;
          return true;
        }
      });
    </script>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  </body>
</html>
