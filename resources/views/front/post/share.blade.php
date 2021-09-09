<style>
    .hidden {
  display: none;
}

svg {
  width: 20px;
  height: 20px;
  margin-right: 7px;
}

button, .button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  height: auto;
  padding-top: 8px;
  padding-bottom: 8px;
  color: #777;
  text-align: center;
  font-size: 14px;
  font-weight: 500;
  line-height: 1.1;
  letter-spacing: 2px;
  text-transform: capitalize;
  text-decoration: none;
  white-space: nowrap;
  border-radius: 4px;
  border: 1px solid #ddd;
  cursor: pointer;
}

button:hover, .button:hover {
  border-color: #cdd;
}

.share-button, .copy-link {
  padding-left: 30px;
  padding-right: 30px;
}

.share-button, .share-dialog {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.share-dialog {
  display: none;
  width: 95%;
  max-width: 500px;
  box-shadow: 0 8px 16px rgba(0,0,0,.15);
  z-index: -1;
  border: 1px solid #ddd;
  padding: 20px;
  border-radius: 4px;
  background-color: #fff;
}

.share-dialog.is-open {
  display: block;
  z-index: 2;
}

header {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
</style>

<li class="social-media">
    <div class="menu">
      <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
      <div class="rotater">
        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
      </div>
      <div class="rotater">
        <p class="js-content" style="display: none" >{{url('post/',$item->id)}} </p>
      <div class="btn btn-icon"><a class="js-content" ><i class="fa fa-facebook"></i>bha</a></div>
      </div>
      <div class="rotater">
        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
      </div>
      <div class="rotater">
        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
      </div>
      <div class="rotater">
        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
      </div>
      <div class="rotater">
        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
        </div>
      </div>
        <div class="rotater">
        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
        </div>
      </div>
      <div class="rotater">
        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
        </div>
      </div>

    </div>
</li>

<span class="js-content">3333</span>
<button class="js-copy">Copy</button>
<script>
  (function(){

/* Creating textarea only once, but not each time */
let area = document.createElement('textarea');
document.body.appendChild( area );
area.style.display = "none";

let content = document.querySelectorAll('.js-content');
let copy    = document.querySelectorAll('.js-copy');

for( let i = 0; i < copy.length; i++ ){
  copy[i].addEventListener('click', function(){
    area.style.display = "block";
    /* because the classes are paired, we can use the [i] index from the clicked button,
    to get the required text block */
    area.value = content[i].innerText;
    area.select();
    document.execCommand('copy');   
    area.style.display = "none";

    /* decorative part */
    this.innerHTML = 'Cop<span style="color: red;">ied</span>';
    /* arrow function doesn't modify 'this', here it's still the clicked button */
    setTimeout( () => this.innerHTML = "Copy", 2000 );
  });
}

})();
</script>