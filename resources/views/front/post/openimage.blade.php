
    <head>
      
      <link rel="stylesheet" href="{{asset('front_asset/lightgallery/lightgallery.css')}} ">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css">
    </head>
    <body>
       <div id="lightgallery">
          @foreach ($post->images as $file)
            <a href="{{asset('/storage/post/image/'.$file->image)}}" >
              <img class="p-3" src="{{asset('/storage/post/image/'.$file->image)}}" alt="">
            </a>
          @endforeach
       </div>
    
       <script src="{{asset('front_asset/lightgallery/lightgallery.js')}}" alt=""></script>
       <script type="text/javascript">
          lightGallery(document.getElementById('lightgallery'),{
          download: false,    
          }); 
        </script>
    </body>
