let onlineDiv = document.getElementsByClassName('onlineDiv');


Array.from(onlineDiv).forEach((element) => {
    let userId = element.id;
    let onlineSym = element.children[1];

    $.post('partials/onlineStatus.php', {
        userId: userId
    }, function (response) {
        if (response) {
            onlineSym.innerHTML = `<i class="fas fa-circle text-success"></i>`;
            $('#status'+userId).html(`<i class="fas fa-circle text-success"></i>`);
        }
    });
});

setInterval(() => {
    Array.from(onlineDiv).forEach((element) => {
        let userId = element.id;
        let onlineSym = element.children[1];

        $.post('partials/onlineStatus.php', {
            userId: userId
        }, function (response) {
            if (response) {
                onlineSym.innerHTML = `<i class="fas fa-circle text-success"></i>`;
                $('#status'+userId).html(`<i class="fas fa-circle text-success"></i>`);
            } else {
                onlineSym.innerHTML = `<i class="fas fa-circle text-danger"></i>`;
                $('#status'+userId).html(`<i class="fas fa-circle text-danger"></i>`);
            }
        });
    });
}, 5000);