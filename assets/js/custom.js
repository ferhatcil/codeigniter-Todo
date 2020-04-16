$(document).ready(function () {
    $(".js-switch").each(function () {
        new Switchery(this);
    });

    $("body").on("change", ".js-switch", function () {
        var $completed = $(this).prop("checked");
        var $url = $(this).data("url");
        $.post($url, {completed: $completed}, function () {
        });
    });

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('whatever');
        var $text = $("#mytable .getTitle" + id).text();
        var modal = $(this);
        modal.find('.modal-body input').val($text);
        $("#updateButton").click(function () {
            var $url = $(this).data("url");
            var $url = $url + id;
            $.post($url, $('#reg-form').serialize(), function () {});
        });
    })
});