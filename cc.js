function incrementValue()
{
    var value = parseInt(document.getElementById('number').innerHTML, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').innerHTML = value;
}

$('.navbar a').on('click', function(e) {
    if(this.hash != ''){
        e.preventDefault();

        const hash =this.hash;

        $('html, body').animate(
            {
                scrollTop: $(hash).offset().top
            },
            800
        );
    }
});