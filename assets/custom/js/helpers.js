const loadingIcon = `<img class="loading" src="assets/img/loading.gif" alt="LOADING_IMG" />`;
const loadingMessage = `Loading ...`;

let redirect = (url) => window.location = url

let reload = () => location.reload()

const loadResource = (resource, targetDiv, args) => {
    $.ajax({
        method: 'GET',
        url: resource,
        data: args,
        beforeSend: () => {
            $(".processing").html(`${loadingIcon}&nbsp;${loadingMessage}`).show()
        },
        success: (data) => {
            $(".processing").hide()
            $(targetDiv).html(data)
        },
        complete: () => {$(".processing").hide();}
    })
}

const overlayShow = (divId, args, resource) => {
    $(divId).modal('toggle');
    loadResource(resource, `${divId}_in`, args);
}

let postIt = (action_page, params, feedback_area='.feedback', processing_area = '.processing') => {
    $.ajax({
        method: 'POST',
        url: action_page,
        data: params,
        processData: false,
        contentType: false,
        beforeSend:  () => {$(processing_area).html(`${loadingIcon}&nbsp;${loadingMessage}`).show()},
        success:  (response) => { $(feedback_area).html(response).show()},
        complete: () => {$(processing_area).hide();},
        error: () => {$(feedback_area).html('Oops! Something went wrong...')}
    })
}

let postData = (action_page, params, feedback_area='.feedback', processing_area = '.processing') => {
    $.ajax({
        method: 'POST',
        url: action_page,
        data: params,
        beforeSend:  () => {$(processing_area).html(`${loadingIcon}&nbsp;${loadingMessage}`).show()},
        success:  (response) => { $(feedback_area).html(response).show()},
        complete: () => {$(processing_area).hide();},
        error: () => {$(feedback_area).html('Oops! Something went wrong...')}
    })
}
