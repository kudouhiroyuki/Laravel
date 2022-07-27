$(document).ready(function() {
  $.ajaxSetup({
    headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  });
  $(".js-chat-submit").click(function() {
    const url = "contactChats";
    $.ajax({
    url: url,
    data: {
      username: $(".js-chat-username").val(),
      name: $(".js-chat-name").val(),
      message: $(".js-chat-message").val(),
    },
    method: "POST"
    });
    return false;
  });
  window.Echo.channel("chat-channel").listen("MessageCreated", e => {
    $(".js-chat-row").append(`
      <div class="mb-3">
        <div style="font-size: 12px; color: #fff">${ e.message.name }</div>
        <div class="clearfix">
          <div class="balloon1 float-left">${ e.message.message }</div>
        </div>
        <div className="clearfix">
          <time style="font-size: 12px">${ e.message.created_at }</time>
        </div>
      </div>
    `);
  });
});