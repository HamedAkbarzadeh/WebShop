$(document).ready(function () {
  $(".cnc_want").hide();
  /*** Start Insert Vote product ***/
  $("#btn_vote").click(function (e) {
    var name = $("#name_vote").val();
    var email = $("#email_vote").val();
    var vote = $("#vote").val();
    var star_rating = $(".selected").length;

    // $(".star_rating span").attr("data-value");

    if (name == "") {
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("لطفا نام و نام خانوادگی خود را وارد کنید .");
    }
    if (email == "") {
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("لطفا ایمیل خود را وارد کنید .");
    }
    if (vote == "") {
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("لطفا نظر خود را وارد کنید .");
    }

    if (name !== "" && email !== "" && vote !== "") {
      $.post(
        "admin/vote/insert-vote-check.php",
        {
          name: name,
          email: email,
          vote: vote,
          star_rating: star_rating,
        },
        function (data) {
          if (data == "ok") {
            End_Of_Plus_Validation();
            $("#msg-validation-p").html(
              "نظر شما با موفقیت ارسال شد و در صف تایید است ."
            );
          } else {
            End_Of_Minus_Validation();
            $("#msg-validation-m").html(
              "خطا در ارسال نظر لطفا بعدا تلاش کنید ."
            );
          }
        }
      );
    }
  });
  /*** End Insert Vote product ***/
  /*** Start search_box ***/
  $(".search_all").css("display", "none");
  var timeOut;
  $("#search_input").keyup(function () {
    clearTimeout(timeOut);
    timeOut = setTimeout(function () {
      sendRequest();
    }, 1000);
  });

  function sendRequest() {
    $.ajax({
      url: `search-check.php`,
      type: "POST",
      data: {
        text: $("#search_input").val(),
      },
      success: function (data) {
        setTimeout(function () {
          $(".loading").css("display", "none");
        }, 2000);
        $(".search_all").css("display", "flex");
        $(".result_search_404").html(data);
      },
      beforeSend: function () {
        $(".loading").css("display", "block");
      },
    });
  }

  /****/
  /*** End search_box ***/

  /*** CaptCha Code ***/
  $("#btn_captcha_refresh").click(function () {
    document.getElementById("captcha_refresh").src =
      "captcha.php  ?r=" + Math.random();
  });
  $("#captcha_refresh").click(function () {
    document.getElementById("captcha_refresh").src =
      "captcha.php  ?r=" + Math.random();
  });
  /*** CaptCha Code ***/

  /**** Start add_user (signup_user) ****/
  $("#form_sign_up").submit(function (e) {
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var password_check = $("#password_check").val();
    var captcha = $("#captcha").val();

    if (
      fname !== "" &&
      lname !== "" &&
      email !== "" &&
      password !== "" &&
      password_check !== "" &&
      captcha !== ""
    ) {
      return;
    } else {
      e.preventDefault();
      if (fname == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("هنوز نام خود را وارد نکردید .");
        setFocus("fname");
      }
      if (lname == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("هنوز نام خانوادگی خود را وارد نکردید .");
        setFocus("lname");
      }
      if (email == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("هنوز ایمیل خود را وارد نکردید .");
        setFocus("email");
      }
      if (password == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("هنوز پسورد خود را وارد نکردید .");
        setFocus("password");
      }
      if (password_check == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("پسورد خود را دوباره وارد کنید .");
        setFocus("password_check");
      }
      if (captcha == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("هنوز کد امنیتی را وارد نکردید .");
        setFocus("captcha");
      }
      if (password !== password_check) {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("پسورد خود را درست وارد نکرده اید .");
        setFocus("password_check");
      }
    }

    if (password == password_check) {
      return;
    } else {
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("پسورد خود را درست وارد نکرده اید .");
      setFocus("password_check");
    }

    if (password !== password_check) {
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("پسورد خود را درست وارد نکرده اید .");
      setFocus("password_check");
    }
    /** length **/
    if (password.length >= 6) {
    } else {
      e.preventDefault();
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("کلمه عبور نباید کمتر از 6 حرف باشد .");
      setFocus("password");
    }
    /** length **/
  });
  /**** End add_user (signup_user) ****/

  /*** Start Login (form_Login) ***/
  $("#form_Login").submit(function (e) {
    var email = $("#email").val();
    var password = $("#password").val();
    var captcha = $("#captcha").val();

    if (email !== "" && password !== "") {
    } else {
      e.preventDefault();
      if (email == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("هنوز ایمیل خود را وارد نکردید .");
        setFocus("email");
      }
      if (password == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("هنوز پسورد خود را وارد نکردید .");
        setFocus("password");
      }
      if (captcha == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("کد امنیتی را وارد کنید .");
        setFocus("captcha");
      }
    }
  });
  /*** End Login (form_Login) ***/

  /*** signUp noti **/
  $(".close-icon").click(function () {
    $(".new_validation").animate(
      {
        height: "0",
      },
      {
        duration: 1100,
        done: function () {
          $(".new_validation").removeClass("d-flex");
        },
      }
    );
  });

  /*** signUp noti **/

  /** Start basket-number **/
  function basketNumber() {
    $.post("basket/basket-number.php", function (data) {
      $(".cart_count").html(data);
    });
  }

  setInterval(basketNumber, 500);
  /** End basket-number **/

  /** Start add-to-basket **/

  /** End add-to-basket **/
  /*** add-to-basket  ***/

  $(".add-to-basket").on("click", add_to_basket);

  function add_to_basket(e) {
    e.preventDefault();
    var id = $(".add-to-basket").attr("id");
    var count = $("#count_product").val();
    var comment_cnc = $("#comment_cnc").val();

    /****/
    if ($("#black-check").hasClass("active")) {
      var color = $("#black-check").attr("data-color");
    }
    if ($("#white-check").hasClass("active")) {
      var color = $("#white-check").attr("data-color");
    }
    if ($("#gold-check").hasClass("active")) {
      var color = $("#gold-check").attr("data-color");
    }
    if ($("#brown-check").hasClass("active")) {
      var color = $("#brown-check").attr("data-color");
    }
    if ($("#cream-check").hasClass("active")) {
      var color = $("#cream-check").attr("data-color");
    }
    if ($("#bony-check").hasClass("active")) {
      var color = $("#bony-check").attr("data-color");
    }
    /****/

    if ($(".color_order_pick").hasClass("active")) {
      $.ajax({
        url: "basket/add-to-basket.php",
        type: "POST",
        data: {
          id,
          count,
          color,
          comment_cnc,
        },
        success: function (data) {
          if (data !== "no") {
            window.location.href = "order-check.php";
          } else {
            End_Of_Minus_Validation();
            $("#msg-validation-m").html(
              "برای خرید باید به حساب کاربری خود ورود کنید ."
            );
          }
        },
      });
    } else {
      e.preventDefault();
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("لطفا رنگ محصول خود را انتخاب کنید .");
    }
  }

  /***** cnc or cut mdf *****/
  $("#Lighting").click(function () {
    if ($("#Lighting").is(":checked")) {
      $(".cnc-order-collection").css("display", "block");
    } else {
      $(".cnc-order-collection").css("display", "none");
      $("#comment_cnc").val("");
      $("#my-file").val("");
      $(".file-return").html("");
    }
  });
  $("#Tables").click(function () {
    if ($("#Tables").is(":checked")) {
      $(".cut-order-collection").css("display", "block");
    } else {
      $(".cut-order-collection").css("display", "none");
    }
  });

  /***** cnc or cut mdf *****/
  /** insert in table order-check **/
  $("#check-order-btn").click(function () {
    /** insert in table **/
    var count = $("#count").val();
    var width = $("#width").val();
    var height = $("#height").val();
    var fa_width = $("#fa_width").val();
    var fa_height = $("#fa_height").val();
    var na_width = $("#na_width").val();
    var na_height = $("#na_height").val();
    var number = $("#number").val();
    var r_code = $("#r_code").val();

    $.ajax({
      url: "basket/add-to-basket-order.php",
      type: "post",
      data: {
        count,
        width,
        height,
        fa_width,
        fa_height,
        na_width,
        na_height,
        number,
        r_code,
      },
      success: function (data) {
        if (data == "ok") {
          End_Of_Minus_Validation();
          $("#msg-validation-m").html(
            "خطا در ثبت اطلاعات لطفا بعدا تلاش فرمایید ."
          );
        } else {
          End_Of_Plus_Validation();
          $("#msg-validation-p").html(
            "اطلاعات با موفقیت ثبت شد. میتوانید اطلاعات سطر دیگر نیز وارد نمایید ."
          );
          $("#tbody-append-answer").html(data);
        }
      },
    });
    /** insert in table **/

    $("#count").val("");
    $("#width").val("");
    $("#height").val("");
    $("#fa_width").val("");
    $("#fa_height").val("");
    $("#na_width").val("");
    $("#na_height").val("");
    $("#number").val("");
  });
  /** insert in table order-check **/
  /**** insert-record-cut  order-check ****/
  // $("#insert-record-cut").click(function () {
  //
  //
  //   for (var i = -1;i <= $(".tr-recorde-cuts").length;i++){
  //     var numbers = i+1;
  //   }
  //   var last_number = numbers+1;
  //
  //
  //   $("#tbody-append").append('<tr class="tr-recorde-cuts">\n' +
  //       '                                <input type="hidden" name="number" id="number" value="' + last_number + '">\n' +
  //       '                                <td class="number-cuts">' + last_number + '</td>\n' +
  //       '                                <td><input type="number" class="form-control" name="count" id="count" placeholder="2" min="1"></td>\n' +
  //       '                                <td><input type="number" class="form-control" name="width" id="width" placeholder="200Cm" min="1"></td>\n' +
  //       '                                <td><input type="number" class="form-control" name="height" id="height" placeholder="100Cm" min="1"></td>\n' +
  //       '                                <td><input type="number" class="form-control" name="fa_width" id="fa_width" placeholder="20Cm" min="1"></td>\n' +
  //       '                                <td><input type="number" class="form-control" name="fa_height" id="fa_height" placeholder="10Cm" min="1"></td>\n' +
  //       '                                <td><input type="number" class="form-control" name="na_width" id="na_width" placeholder="15Cm" min="1"></td>\n' +
  //       '                                <td><input type="number" class="form-control" name="na_height" id="na_height" placeholder="16Cm" min="1"></td>\n' +
  //       // '                                <td><i class="fas fa-check big-font"></i></td>\n' +
  //       '                                </tr>');
  // });
  /**** insert-record-cut  order-check ****/
  /**** insert all-info-order in table (image) ****/
  // $("#btn-submit-order").click(function () {
  //   alert('h');
  // })
  /**** insert all-info-order in table (image) ****/
  /**** delete-record-cut  order-check ****/
  $(".a-link-order").click(function () {
    var r_code = $("#r_code").val();

    $.ajax({
      url: "basket/delete-to-basket-order.php",
      type: "post",
      data: {
        r_code,
      },
      success: function (data) {
        if (data == "ok") {
          End_Of_Minus_Validation();
          $("#msg-validation-m").html(
            "خطا در حذف اطلاعات لطفا بعدا تلاش فرمایید ."
          );
        } else {
          End_Of_Plus_Validation();
          $("#msg-validation-p").html("تمام اطلاعات برش با موفقیت حذف شد .");
          $("#tbody-append-answer").html(data);
        }
      },
    });
  });
  /**** delete-record-cut  order-check ****/

  /***** add-to-basket ******/
  /**** icon_cnc_close ****/
  $(".icon_cnc_close").click(function () {
    $(".cnc_want").fadeOut("slow");
  });
  $(".box_cnc_exit").click(function () {
    $(".cnc_want").fadeOut("slow");
  });
  /**** icon_cnc_close ****/

  /**** add-info-basket (step 2) ******/
  $("#form_update_info_state").submit(function (e) {
    e.preventDefault();
    if ($("#option-1").is(":checked")) {
      $("#comment_cnc").val("");
      $("#photo_cnc").val("");

      $.ajax({
        url: "basket/update-basket-state-info-two.php",
        method: "POST",
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          if (data == "ok") {
            $(".cnc_want").fadeOut("fast");
            End_Of_Plus_Validation();
            $("#msg-validation-p").html(
              "محصول شما با موفقیت به سبد خرید اضافه شد ."
            );
          } else {
            End_Of_Minus_Validation();
            $("#msg-validation-m").html(
              "مشکل در ارسال اطلاعات لطفا بعدا تلاش کنید ."
            );
          }
        },
      });
    }
    if ($("#option-2").is(":checked")) {
      $.ajax({
        url: "basket/update-basket-state-info.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          if (data == "ok") {
            $(".cnc_want").fadeOut("fast");
            End_Of_Plus_Validation();
            $("#msg-validation-p").html(
              "محصول شما با موفقیت به سبد خرید اضافه شد ."
            );
          } else {
            End_Of_Minus_Validation();
            $("#msg-validation-m").html(
              "باید حجم عکس کمتر از 2 مگابایات و از پسوند های jpg,jpeg,png باشد ."
            );
          }
        },
      });
    }
  });
  /**** add-info-basket ******/

  /*** header closed_icon product ***/
  $(".closed_icon").click(function () {
    var id = $(this).attr("id");
    $.post(
      "basket/delete-basket-header-check.php",
      { id: id },
      function (data) {
        if (data !== "ok") {
          End_Of_Plus_Validation();
          $("#msg-validation-p").html("کالا مورد نظر با موفقیت حذف شد .");
        } else {
          End_Of_Minus_Validation();
          $("#msg-validation-m").html("خطا در حذف کالا .");
        }
      }
    );
  });
  /*** header closed_icon product ***/

  /*** header btn_update_basket ***/
  $(".btn_update_basket").click(function () {
    $.post("basket/update-basket.php", function (data) {
      $(".cart_list").html(data);

      $(".closed_icon").click(function () {
        var id = $(this).attr("id");
        $.post(
          "basket/delete-basket-header-check.php",
          { id: id },
          function (data) {
            if (data !== "ok") {
              End_Of_Plus_Validation();
              $("#msg-validation-p").html("کالا مورد نظر با موفقیت حذف شد .");
            } else {
              End_Of_Minus_Validation();
              $("#msg-validation-m").html("خطا در حذف کالا .");
            }
          }
        );
      });
    });
  });
  /*** header btn_update_basket ***/

  ///***** function upload file (shop detail) ////
  /*
          By Osvaldas Valutis, www.osvaldas.info
          Available for use under the MIT License
      */
  $("#file-7").hide();
  ("use strict");

  (function (document, window, index) {
    var inputs = document.querySelectorAll(".inputfile");
    Array.prototype.forEach.call(inputs, function (input) {
      var label = input.nextElementSibling,
        labelVal = label.innerHTML;

      input.addEventListener("change", function (e) {
        var fileName = "";
        if (this.files && this.files.length > 1)
          fileName = (this.getAttribute("data-multiple-caption") || "").replace(
            "{count}",
            this.files.length
          );
        else fileName = e.target.value.split("\\").pop();

        if (fileName) label.querySelector("span").innerHTML = fileName;
        else label.innerHTML = labelVal;
      });

      // Firefox bug fix
      input.addEventListener("focus", function () {
        input.classList.add("has-focus");
      });
      input.addEventListener("blur", function () {
        input.classList.remove("has-focus");
      });
    });
  })(document, window, 0);
  ///***** function upload file (shop detail) ////

  /*** count_product ***/
  $("#plus_count").click(function () {
    var count_pr = $("#count_product").val();
    var count_hidden = $("#count_hidden").val();

    if (count_pr == count_hidden) {
      $("#plus_count").hide();
    }
  });
  $("#minus_count").click(function () {
    var count_product = $("#count_product").val();
    var count_hide = $("#count_hidden").val();

    if (count_product <= count_hide) {
      $("#plus_count").show();
    }
  });

  $("#counter_plus").click(function () {
    var counter_product = $("#counter_product").val();
    var counter_hidden = $("#counter_hidden").val();

    if (counter_product >= counter_hidden) {
      $("#counter_plus").hide();
    }
  });
  $("#counter_minus").click(function () {
    var counter_product = $("#counter_product").val();
    var counter_hidden = $("#counter_hidden").val();

    if (counter_product <= counter_hidden) {
      $("#counter_plus").show();
    }
  });
  /*** count_product ***/

  /*** delete_order_account ***/
  $(".delete_order_account").click(function () {
    var id = $(this).attr("id");
    $.post(
      "basket/delete-basket-header-check.php",
      { id: id },
      function (data) {
        if (data == "ok") {
          End_Of_Plus_Validation();
          $("#msg-validation-p").html("کالا مورد نظر با موفقیت حذف شد .");
        } else {
          End_Of_Minus_Validation();
          $("#msg-validation-m").html("خطا در حذف کالا");
        }
      }
    );
  });
  /*** delete_order_account ***/

  /*** update_basket_account ***/
  $(".update_basket_account").click(function () {
    var id = $(this).attr("id");
    $.post("basket/update_basket_account.php", { id: id }, function (data) {
      $(".basket_my_account").html(data);

      $(".delete_order_account").click(function () {
        var id = $(this).attr("id");
        $.post(
          "basket/delete-basket-header-check.php",
          { id: id },
          function (data) {
            if (data !== "ok") {
              End_Of_Plus_Validation();
              $("#msg-validation-p").html("کالا مورد نظر با موفقیت حذف شد .");
            } else {
              End_Of_Minus_Validation();
              $("#msg-validation-m").html("خطا در حذف کالا");
            }
          }
        );
      });
    });
  });
  /*** update_basket_account ***/
  /**** email_news box *****/
  $("#btn_email_news").click(function () {
    var email_news = $("#email_news").val();
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (email_news !== ""){
      if (email_news.match(mailformat)){
        $.ajax({
          method: "post",
          url: "user/send-email-news.php",
          data: { email_news },
          success: function (data) {
            if (data !== "no") {
              End_Of_Plus_Validation();
              $("#msg-validation-p").html(
                  "ایمیل شما با موفقیت در لیست خبرنامه ثبت شد ."
              );
              $("#email_news").val("");
            }else {
              End_Of_Minus_Validation();
              $("#msg-validation-m").html("ابتدا وارد حساب کاربری شوید .");
            }
          },
        });
      }else {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("ایمیل خود را درست وارد نمایید.");
      }
    }else {
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("ابتدا ایمیل خود را وارد نمایید .");
    }

  });
  /**** email_news box *****/

  /*** select city function ***/
  $("#city").change(function () {
    var city = $(this).find("option:selected").text();
  });

  $("#state").change(function () {
    var id = $(this).find("option:selected").val();
    $.ajax({
      method: "post",
      url: "iran_cities/city.php",
      data: { id: id },
      success: function (msg) {
        $("#city").html(msg);
      },
    });
  });
  /*** select city function ***/

  /**** in_city And out_city ****/
  /**** state ****/
  $(".product-subtotal").html("ابتدا شهر و استان خود را انتخاب کنید .");
  $("#price_post").html("ابتدا شهر و استان خود را انتخاب کنید .");

  /***** update_shop_cart *****/
  $("#btn_update_checkout").click(function () {
    var state = $("#state").val();
    var city = $("#city").val();
    var New_price = $("#New_price").val();
    /****/
    if (state == 10 && city == 153) {
      var hidden_in_city = $("#hidden_in_city").val();
      var first_num = parseFloat(New_price);
      var second_num = parseFloat(hidden_in_city);
      var Last_Price = first_num + second_num;

      $(".product-subtotal").html(separateNum(Last_Price) + " تومان ");

      $("#price_post").html(separateNum(hidden_in_city) + " تومان ");
    } else {
      var hidden_out_city = $("#hidden_out_city").val();
      var first_num_out = parseFloat(New_price);
      var second_num_out = parseFloat(hidden_out_city);
      var Last_Price_out = first_num_out + second_num_out;

      $("#price_post").html(separateNum(hidden_out_city) + " تومان ");

      $(".product-subtotal").html(separateNum(Last_Price_out) + " تومان ");
    }
  });

  /**** order_product (check_Out) ****/
  $("#order_product").click(function (e) {
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var address = $("#billing_address").val();
    var code_post = $("#code_post").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var state = $("#state").val();
    var city = $("#city").val();

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (email.match(mailformat)){
    if (
      phone.length == 11 &&
      fname !== "" &&
      lname !== "" &&
      address !== "" &&
      code_post !== "" &&
      phone !== "" &&
      email !== "" &&
      state !== 0 &&
      city !== 0
    ) {
      return;
    } else {
      e.preventDefault();
      if (fname == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("نام خود را وارد کنید .");
        setFocus("fname");
      }
      if (lname == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("نام خانوادگی خود را وارد کنید .");
        setFocus("lname");
      }
      if (address == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("آدرس خود را وارد کنید .");
        setFocus("billing_address");
      }
      if (code_post == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("کد پستی خود را وارد کنید .");
        setFocus("code_post");
      }
      if (phone == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("شماره تلفن خود را وارد کنید .");
        setFocus("phone");
      }
      if (phone.length < 11 || phone.length > 11) {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("شماره تلفن خود را درست وارد کنید .");
        setFocus("phone");
      }
      if (email == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("ایمیل خود را وارد کنید .");
        setFocus("email");
      }
      if (state == "start") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("استان خود را وارد کنید .");
        setFocus("state");
      }
    }
    }else {
      End_Of_Minus_Validation();
      $("#msg-validation-m").html("ایمیل خود را درست وارد کنید .");
      setFocus("email");
    }
    if (state !== 0) {
      if (state == 10 && city == 153) {
        var hidden_in_city = $("#hidden_in_city").val();
        var New_price = $("#New_price").val();
        var first_num = parseFloat(New_price);
        var second_num = parseFloat(hidden_in_city);
        var Last_Price = first_num + second_num;

        $(".product-subtotal").html(separateNum(Last_Price) + " تومان ");

        $("#price_post").html(separateNum(hidden_in_city) + " تومان ");
      }
    }
  });
  /**** order_product (check_Out) ****/
  $(".keyDown_phone").keydown(function () {
    var k = window.event.keyCode;
    if (
      (k > 57 || k < 48) &&
      (k < 33 || k > 40) &&
      k != 45 &&
      k != 46 &&
      k != 8
    ) {
      return false;
    }
  });
  /***** form_admin_login *****/
  $("#form_admin_login").submit(function (e) {
    var username = $("#username_admin").val();
    var password = $("#password_admin").val();
    var captcha = $("#captcha_admin").val();

    if (username !== "" && password !== "" && captcha !== "") {
    } else {
      e.preventDefault();
      if (username == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("لطفا نام کاربری خود را وازد کنید .");
        setFocus("username");
      }
      if (password == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("لطفا  پسورد خود را وازد کنید .");
        setFocus("password");
      }
      if (captcha == "") {
        End_Of_Minus_Validation();
        $("#msg-validation-m").html("لطفا کد امنیتی  خود را وازد کنید .");
        setFocus("captcha");
      }
    }
  });
  /***** form_admin_login *****/
  /****** shop-load-categories ******/
  $("#shop-load-categories").change(function (e) {
    var data = $(this).val();

    $.ajax({
      url: "order_shop_load/order-shop-load.php",
      method: "POST",
      data: data,
      success: function (data) {
        $("#show-load-more-order").html(data);
      },
    });
  });
  /**** $_POST["search"] ****/
  $("#shop-load-categories-search").change(function (e) {
    var data = $(this).val();

    $.ajax({
      url: "order_shop_load/order-shop-load-search.php",
      method: "POST",
      data: data,
      success: function (data) {
        $("#show-load-more-order").html(data);
      },
    });
  });
  /**** $_POST["search"] ****/
  /****** shop-load-categories ******/

  /*** Start search_box 404.php ***/
  $("#result_404_search").css("display", "none");
  var timeOut404;
  $("#search_box_404").keyup(function () {
    clearTimeout(timeOut);
    timeOut404 = setTimeout(function () {
      sendRequest404();
    }, 1000);
  });

  function sendRequest404() {
    $.ajax({
      url: `search-check.php`,
      type: "POST",
      data: {
        text: $("#search_box_404").val(),
      },
      success: function (data) {
        setTimeout(function () {}, 2000);
        $("#result_404_search").css("display", "block");
        $(".result_search_404").html(data);
      },
      beforeSend: function () {},
    });
  }

  /****/
  /*** End search_box 404.php ***/

  /***** footer ******/
  $("#order_footer").click(function () {
    document.querySelector(".orders-tab-ORDER").click();
  });

  /***** footer ******/

  /******** Start msg Box *************/
  function End_Of_Minus_Validation() {
    $(".MSG_ALL_NOTI_MINUS").css("display", "flex");
    $(".full_bottom_Border_validation").css("width", "0px");

    $(".full_bottom_Border_validation").animate(
      {
        width: "100%",
      },
      {
        duration: 5000,
        done: function EndOfValidation() {
          $(".MSG_ALL_NOTI_MINUS").fadeOut();
        },
      }
    );
  }

  function End_Of_Plus_Validation() {
    $(".MSG_ALL_NOTI_PLUS").css("display", "flex");
    $(".full_bottom_Border_validation").css("width", "0px");

    $(".full_bottom_Border_validation").animate(
      {
        width: "100%",
      },
      {
        duration: 5000,
        done: function () {
          $(".MSG_ALL_NOTI_PLUS").fadeOut();
        },
      }
    );
  }

  /******** End msg Box *************/
  /*** function ***/
  function setFocus(id) {
    document.getElementById(id).focus();
  }

  function separateNum(value, input) {
    /* seprate number input 3 number */
    var nStr = value + "";
    var x1;
    var x2;
    nStr = nStr.replace(/\,/g, "");
    x = nStr.split(".");
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, "$1" + "," + "$2");
    }
    if (input !== undefined) {
      input.value = x1 + x2;
    } else {
      return x1 + x2;
    }
  }

  /*** function ***/
});
