<template>
    <div class="product-review-stars">
        <input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" @click="emitValue(5)"/><label for="star5" title="Rocks!">★</label>
        <input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" @click="emitValue(4)" /><label for="star4" title="Pretty good">★</label>
        <input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" @click="emitValue(3)" /><label for="star3" title="Meh">★</label>
        <input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" @click="emitValue(2)" /><label for="star2" title="Kinda bad">★</label>
        <input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" @click="emitValue(1)" /><label for="star1" title="Sucks big time">★</label>
    </div>
</template>

<script>
export default {
    name: 'Stars',
    data(){
        return{
            value: String
        }
    },
    methods:{
        emitValue(value){
            this.$emit('EmitValue', value);
        }
    }


}
</script>

<style scoped>
*{
    font-family: "Lato";
}

/*decoration*/
h1{
    margin: 20px 50px 0;
    width:  275px;
    font-size: 1.5em;
    text-align: center;
    border-radius: 5px 5px 0 0;
    padding: 30px 0;
    color: #34495E;
}
h1:before{
    color: #E74C3C;
    content: "★";
    display: block;
    font-size: 2em;
    padding: 20px 0;
}
.product-review-stars{
    margin: 0 50px;
    padding: 20px 50px 20px 20px;
}

.product-review-stars label{
    text-shadow: 0px 0px 10px black;
}

/*end decoration*/

.visuallyhidden{
    position: absolute !important; clip: rect(1px 1px 1px 1px); clip: rect(1px, 1px, 1px, 1px);
}
.product-review-stars label:after{
    content: "★";
    color: inherit;
    -webkit-transform: scale(4);
    position: absolute;
    z-index: 4;
    left: 0px;
    transition: all .4s;
    opacity: 0;
    color: inherit;
    visibility: hidden;

}

.product-review-stars input:checked + label:after{
    visibility: visible;
    -webkit-transform: scale(1);
    opacity: 1;
}

.product-review-stars  {
    unicode-bidi: bidi-override;
    direction: rtl;
    width:  250px;
}

.product-review-stars label{
    font-family: "icomoon";
    font-size: 2em;
    position: relative;
    cursor: pointer;
    color: #DFE3E4;
}
.product-review-stars input:checked ~ label:before{
    opacity: 1;
}
.product-review-stars:hover input ~ label:before{
    opacity: 0;
}

.product-review-stars input + label:before{
    content: "\2605";
    position: absolute;
    right: 0;
    opacity: 0;
    transition: opacity .3s ease-in-out, color .3s ease-in-out;
    backface-visibility:hidden;
    -webkit-backface-visibility:hidden; /* Chrome and Safari */
    -moz-backface-visibility:hidden; /* Firefox */
    -ms-backface-visibility:hidden; /* Internet Explorer */
}
.product-review-stars input + label:hover:before,
.product-review-stars input + label:hover ~ label:before
{
    opacity: 1;
}
.product-review-stars input + label:nth-of-type(1):after,
.product-review-stars input + label:nth-of-type(1):before,
.product-review-stars input +  label:nth-of-type(1):hover:before,
.product-review-stars input + label:nth-of-type(1):hover ~ label:before,
.product-review-stars input:nth-of-type(1):checked ~ label:before{
    color: #2ecc71;
}
.product-review-stars input + label:nth-of-type(2):after,
.product-review-stars input + label:nth-of-type(2):before,
.product-review-stars input + label:nth-of-type(2):hover:before,
.product-review-stars input + label:nth-of-type(2):hover ~ label:before,
.product-review-stars input:nth-of-type(2):checked ~ label:before{
    color: #f1c40f;
}
.product-review-stars input + label:nth-of-type(3):after,
.product-review-stars input + label:nth-of-type(3):before,
.product-review-stars input + label:nth-of-type(3):hover:before,
.product-review-stars input + label:nth-of-type(3):hover ~ label:before,
.product-review-stars input:nth-of-type(3):checked ~ label:before{
    color: #F39C12;
}
.product-review-stars input + label:nth-of-type(4):after,
.product-review-stars input + label:nth-of-type(4):before,
.product-review-stars input + label:nth-of-type(4):hover:before,
.product-review-stars input + label:nth-of-type(4):hover ~ label:before,
.product-review-stars input:nth-of-type(4):checked ~ label:before{
    color: #e74c3c;
}

.product-review-stars input + label:nth-of-type(5):after,
.product-review-stars input + label:nth-of-type(5):before,
.product-review-stars label:nth-of-type(5):hover:before,
.product-review-stars input:nth-of-type(5):checked ~ label:before{
    color: #d35400;
}

.product-review-stars label:nth-of-type(5):hover:before{
    color: #d35400 !important;
}
</style>
