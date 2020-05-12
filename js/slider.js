var scLeft = $('.slider-control-left'),
    scRight = $('.slider-control-right'),
    slider = $('.product-overview-slider'),
    sliderPosition = 0,
    slideDistance = 84;

scLeft.on('click', function () {
    sliderPosition = sliderPosition - slideDistance;
    moveSlider(sliderPosition);
});

scRight.on('click', function () {
    sliderPosition = sliderPosition + slideDistance;

    if (0 >= sliderPosition) {
        moveSlider(sliderPosition);
    } else {
        sliderPosition = 0;
    }
});

function moveSlider(position)
{
    hideSliderControll();
    slider.animate({marginLeft: position + 'em'});
}

function hideSliderControll() {
    if (sliderPosition === 0) {
        scRight.hide();
    } else {
        scRight.show();
    }
}

$(document).ready(function () {
    addProductDetailsToSlider();
    hideSliderControll();
});

function addProductDetailsToSlider() {
    for (let i = 0; i < products.length; i++) {
        let product = products[i];
        let element = '<div class="product-details" style="background-image: url(' + product.picture + ')">' +
                '<div class="product-details-info">' +
                    '<div class="product-description">' + product.description + '</div>' +
                    '<div class="product-price">' + product.price + ' </div>' +
                '</div>' +
            '</div>';
        slider.append(element);
    }
}