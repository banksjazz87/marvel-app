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

});