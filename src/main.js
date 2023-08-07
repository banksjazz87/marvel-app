$(function() {

    //Controls the initial datatable page length.
    $('#marvel_table').dataTable({
        pageLength: 25
    });

    //Updates the url when the user clicks on a hero image in the datatable.
    $(".hero-image").click((e) => {
        e.preventDefault();

        let currentId = e.target.id;
        let newURL = `/views/character.php/?id=${currentId}`;

        window.location = newURL;
    });

    //Controls the display of the overlay.
    $("#overlay-toggle").click(() => {
        $("#selected-card-overlay").css('display', 'none');
        $("#show-more-card-text-content").css('display', 'none');

        hideComicDescription();
    });


    /**
     * @return void.
     * @description adds an event listener to each of the comic cards as seen on the character pages.  Updates the image, description text, and title of the card that overlays the display.
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

                //Checks to see if there is a description that goes along with the comic, if not, nothing is displayed.
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

    //Call the function to add the event listeners.
    comicCardClick();

    //Show the card text content, hide the show more card text content.
    $("#comic-description-btn").click(() => {
        $('#card-text-content').css("display", "");
        $('#show-more-card-text-content').css('display', 'none');
    });


    //Hide the text content associated with the comic and display the option to show more text.
    function hideComicDescription() {
        $("#card-text-content").css("display", "none");
        $('#show-more-card-text-content').css("display", "");
    }
    $("#card-content-toggle").click((e) => {
        hideComicDescription();
    })

});