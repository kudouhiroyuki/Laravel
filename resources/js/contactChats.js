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
      message: "テスト",
    },
    method: "POST"
    });
    return false;
  });
  window.Echo.channel("chat-channel").listen("MessageCreated", e => {
    console.log("Chat MessageCreated")
    console.log(e)
    $(".js-chat .js-chat-board").prepend(
    "<div><label>タイトル：</label>" + e.message.message + "</div>"
    );
    $(".js-chat .js-chat-board").prepend(
    "<div><label>内容：</label>" + e.message.message + "</div>"
    );
  });
});