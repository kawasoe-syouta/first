$(function() {
  get_data();
});

function get_data() {
  $.ajax({
      url: "result/ajax/",
      dataType: "json",
      success: data => {
        $("#comment-data")
        .find(".comment-visible")
        .remove();

        for (var i = 0; i < data.messages.length; i++) {
            var html = `
                        <div class="media comment-visible">
                            <div class="media-body comment-body">
                                <div class="row">
                                    <span class="comment-body-user" id="name">${data.messages[i].name}</span>
                                    <span class="comment-body-time" id="created_at">${data.messages[i].created_at}</span>
                                </div>
                                <span class="comment-body-content" id="comment">${data.messages[i].message}</span>
                            </div>
                        </div>
                    `;

            $("#comment-data").append(html);
        }
      },
      error: () => {
          alert("ajax Error");
      }
  });

  setTimeout("get_data()", 5000);
}