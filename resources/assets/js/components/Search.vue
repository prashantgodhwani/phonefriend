<template>
    <div class="input-group">
        <input type="text" id="search" class="form-control search-field" dir="ltr" value="" name="s" placeholder="Search for products">
        <div class="input-group-addon search-categories">
            <select name="product_cat" id="product_cat" class="postform resizeselect" style="width: 144px;">
                <option value="0" selected="selected">All Categories</option>
                <option class="level-0" value="laptops-laptops-computers">Laptops</option>
                <option class="level-0" value="ultrabooks-laptops-computers">Ultrabooks</option>
                <option class="level-0" value="mac-computers-laptops">Mac Computers</option>
                <option class="level-0" value="all-in-one-laptops-computers">All in One</option>
                <option class="level-0" value="servers">Servers</option>
                <option class="level-0" value="peripherals">Peripherals</option>
                <option class="level-0" value="gaming-laptops-computers">Gaming</option>
                <option class="level-0" value="accessories-laptops-computers">Accessories</option>
                <option class="level-0" value="audio-speakers">Audio Speakers</option>
                <option class="level-0" value="headphones">Headphones</option>
                <option class="level-0" value="computer-cases">Computer Cases</option>
                <option class="level-0" value="printers">Printers</option>
                <option class="level-0" value="cameras">Cameras</option>
                <option class="level-0" value="smartphones">Smartphones</option>
                <option class="level-0" value="game-consoles">Game Consoles</option>
                <option class="level-0" value="power-banks">Power Banks</option>
                <option class="level-0" value="smartwatches">Smartwatches</option>
                <option class="level-0" value="chargers">Chargers</option>
                <option class="level-0" value="cases">Cases</option>
                <option class="level-0" value="headphone-accessories">Headphone Accessories</option>
                <option class="level-0" value="headphone-cases">Headphone Cases</option>
                <option class="level-0" value="tablets">Tablets</option>
                <option class="level-0" value="tvs">TVs</option>
                <option class="level-0" value="wearables">Wearables</option>
                <option class="level-0" value="pendrives">Pendrives</option>
            </select>
        </div>
        <div class="input-group-btn" id="app">
            <input type="hidden" id="search-param" name="post_type" value="product">
            <button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
        </div>
    </div>
</template>


<script>
    var algoliasearch = require('algoliasearch');
    var client = algoliasearch("Q5IYJ43XF9", "eb9bda691044aed1d217db64608643dc");
    var index = client.initIndex('data');
    export default{

        mounted(){
            index.search('apple',(err,content) =>{
                console.log(err,content)
            })
        }
    }


</script>