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
     * 
     * @param {*} str takes on the type of string.
     * @param {*} element takes on the type of an HTML element.
     * @return void.
     * @description determines if an element should be shown based on text content being present.
     */
    function checkForDescription(str, element) {
        str ? element.style.display = "" : element.style.display = "none";
    }


    /**
     * @return void.
     * @description adds an event listener to each of the comic cards as seen on the character pages.
     */
    function comicCardClick() {
        let cards = $(".comic-card");
        let images = $(".card-img");
        let description = $(".hidden-card-description");
        let title = $('.card-title');

        for (let i = 0; i < cards.length; i++) {
            cards[i].addEventListener('click', (e) => {
                let currentImage = images[i].src;
                let currentTitle = title[i].innerHTML;
                let currentAltText = images[i].alt;
                let currentDescription = description[i].innerHTML;

                $("#selected-card-overlay").css("display", "");
                $("#selected-card-image").attr("src", `${currentImage}`);
                $("#selected-card-image").attr('alt', `${currentAltText}`);


                if (currentDescription) {
                    $("#show-more-card-text-content").css('display', '');
                    $("#selected-card-description").text(currentDescription);
                    $('#selected-card-title').text(currentTitle);
                } else {
                    $("#show-more-card-text-content").css('display', 'none');
                }
            });
        }
    }

    comicCardClick();

    $("#comic-description-btn").click(() => {
        $('#card-text-content').css("display", "");
        $('#show-more-card-text-content').css('display', 'none');
    });


    $("#card-content-toggle").click(() => {
        $("#card-text-content").css("display", "none");
        $('#show-more-card-text-content').css("display", "");
    })



});