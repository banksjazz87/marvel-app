$(function() {

    $('#marvel_table').dataTable({
        pageLength: 25
    });


    $(".hero-image").click((e) => {
        e.preventDefault();

        let currentId = e.target.id;
        let newURL = `/views/character.php/?id=${currentId}`;

        window.location = newURL;
    });


    $("#overlay-toggle").click(() => {
        $("#selected-card-overlay").css('display', 'none');
    });


    /**
     * @return void;
     * @description adds an event listener to each of the comic cards as seen on the character pages.
     */
    function comicCardClick() {
        let cards = $(".comic-card");
        let images = $(".card-img");

        for (let i = 0; i < cards.length; i++) {
            cards[i].addEventListener('click', (e) => {
                let currentImage = images[i].src;
                let currentAltText = images[i].alt;

                $("#selected-card-overlay").css("display", "");
                $("#selected-card-image").attr("src", `${currentImage}`);
                $("#selected-card-image").attr('alt', `${currentAltText}`);

            });
        }
    }

    comicCardClick();


});