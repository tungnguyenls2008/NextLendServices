@extends('layouts.app')

<style>
    [id^=shop_video_td] {
        display: none;
    }

    [id^=id_image_td] {
        display: none;
    }

    [id^=biz_permit_td] {
        display: none;
    }

    [id^=shop_video_upload_label] {
        display: none;
    }

    [id^=id_image_upload_label] {
        display: none;
    }

    [id^=biz_permit_upload_label] {
        display: none;
    }


</style>
@section('content')
    <div class="panel">
        <?php

        function get_browser_name($user_agent)
        {
            if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
            elseif (strpos($user_agent, 'Edge')) return 'Edge';
            elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
            elseif (strpos($user_agent, 'Safari') && (!strpos($user_agent, 'Chrome'))) return 'Safari';
            elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
            elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

            return 'Other';
        }

        // Usage:

        $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);
        ?>
        @if($browser=='Safari')
            <div class="panel panel-heading"><h3><i>Trình duyệt Safari hiện không được hỗ trợ, đề nghị chuyển sang trình
                        duyệt Chrome để tiếp tục.</i></h3>
            </div>
        @else
            <div class="panel panel-heading"><h3></h3>
                <div id='TextBoxesGroup' class="panel panel-body">
                    <div id="TextBoxDiv1" style="text-align: left">
                        <label>Customer type name:</label>
                        <label for="type_name1" id="type_name_label1"></label><input
                            id="type_name1"
                            name="type_name1">
                        <table class="table table-responsive" id="customer_type_table" style="text-align: left">
                            <tr id="new_document_tr1" class="new_document_tr">
                                <td id="removeButtonTd1"><a type="button" id="removeButton1" style="width: auto"
                                                            class=" btn btn-danger removeThis"><i class="fa fa-minus"
                                                                                       aria-hidden="true"></i></a>
                                </td>
                                <td id="document_type_td1">
                                    <label for="document_type1" id="document_type_label1">Loại tài liệu:</label><select
                                        id="document_type1"
                                        name="document_type1">
                                        <option value="" disabled selected>---Chọn loại tài liệu---</option>
                                        <option value="shop_video">Video cửa hàng</option>
                                        <option value="id_image">Ảnh CMND/hộ chiếu</option>
                                        <option value="biz_permit">Giấy phép kinh doanh</option>
                                    </select></td>
                                <td id="shop_video_td1">
                                    <label for="shop_video_upload1"
                                           id="shop_video_upload_label1">Chọn video:</label><input type="file"
                                                                                                  id="shop_video_upload1"
                                                                                                  name="shop_video_upload1">
                                </td>
                                <td id="id_image_td1">
                                    <label for="id_image_upload1"
                                           id="id_image_upload_label1">Chọn hình ảnh:</label><input type="file"
                                                                                                   id="id_image_upload1"
                                                                                                   name="id_image_upload1">
                                </td>
                                <td id="biz_permit_td1">
                                    <label for="biz_permit_upload1"
                                           id="biz_permit_upload_label1">Chọn văn bản:</label><input type="file"
                                                                                                      id="biz_permit_upload1"
                                                                                                      name="biz_permit_upload1">
                                </td>
                            </tr>
                        </table>

                    </div>
                    <a type='button' id='addButton' style="width: auto"
                       class=" btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                <input type='button' value='Create' id='getButtonValue' style="width: auto" class=" btn btn-success">
            </div>
        @endif
    </div>


    <script>
        $(document).ready(function () {
            function detectBrowser() {
                var browser;
                if ((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1) {
                    browser = 'Opera';
                } else if (navigator.userAgent.indexOf("Chrome") != -1) {
                    browser = 'Chrome';
                } else if (navigator.userAgent.indexOf("Safari") != -1 && navigator.userAgent.indexOf("Chrome") == -1) {
                    browser = 'Safari';
                } else if (navigator.userAgent.indexOf("Firefox") != -1) {
                    browser = 'Firefox';
                } else if ((navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) //IF IE > 10
                {
                    browser = 'IE';
                } else {
                    browser = 'unknown';
                }
                return browser;
            }

            $("#document_type1").change(function () {
                if ($(this).val() == 'shop_video') {
                    $("#shop_video_upload1").fadeIn(250).show();
                    $("#shop_video_upload_label1").fadeIn(250).show();
                    $("#id_image_upload1").hide();
                    $("#id_image_upload_label1").hide();
                    $("#biz_contract_upload1").hide();
                    $("#biz_contract_upload_label1").hide();
                    $("#shop_video_td1").fadeIn(250).show();
                    $("#id_image_td1").hide();
                    $("#biz_contract_td1").hide();
                } else if ($(this).val() == 'id_image') {
                    $("#shop_video_upload1").hide();
                    $("#shop_video_upload_label1").hide();
                    $("#id_image_upload1").fadeIn(250).show();
                    $("#id_image_upload_label1").fadeIn(250).show();
                    $("#biz_contract_upload1").hide();
                    $("#biz_contract_upload_label1").hide();
                    $("#shop_video_td1").hide();
                    $("#id_image_td1").fadeIn(250).show();
                    $("#biz_contract_td1").hide();
                } else if ($(this).val() == 'biz_permit') {
                    $("#shop_video_upload1").hide();
                    $("#shop_video_upload_label1").hide();
                    $("#id_image_upload1").hide();
                    $("#id_image_upload_label1").hide();
                    $("#biz_contract_upload1").show();
                    $("#biz_contract_upload_label1").fadeIn(250).show();
                    $("#shop_video_td1").hide();
                    $("#id_image_td1").hide();
                    $("#biz_contract_td1").fadeIn(250).show();
                }

            });


            var counter = 2;

            $("#addButton").click(function () {
                for (var r = 1; r <= counter; r++) {
                    if (($("#document_type" + r).val() == 'shop_video' && $("#shop_video_upload" + r).val() == null)
                        || ($("#document_type" + r).val() == 'id_image' && $("#id_image_upload" + r).val() == null)
                        || ($("#document_type" + r).val() == 'biz_permit' && $("#biz_permit_upload" + r).val() == null)) {
                        alert('Hoàn thành khai báo trước khi mở loại tài liệu mới');
                        return false;
                    }
                }
                if ($('#document_type' + (counter - 1) + ' option:selected').val() == '') {
                    alert('Hoàn thành khai báo trước khi mở loại tài liệu mới');
                    return false;
                }


                var common_part = '<tr id="new_document_tr' + counter + '" class="new_document_tr"><td id="removeButtonTd' + counter + '"><a type="button" id="removeButton' + counter + '" style="width: auto"\n' +
                    '                                                                        class=" btn btn-danger removeThis"><i class="fa fa-minus" aria-hidden="true"></i></a></td>' +
                    '<td id="document_type_td' + counter + '"><label></label>' + '<label for="document_type' + counter + '" id="document_type_label' + counter + '">Loại tài liệu:</label><select id="document_type' + counter + '" name="document_type' + counter + '">\n' +
                    '      <option  value="" disabled selected >---Chọn loại tài liệu---</option>\n' +
                    '      <option value="shop_video">Video cửa hàng</option>\n' +
                    '      <option value="id_image">Ảnh CMND/hộ chiếu</option>\n' +
                    '      <option value="biz_permit">Giấy phép kinh doanh </option>\n' +
                    '    </select></td>\n' +
                    '    <td id="shop_video_td' + counter + '"><label for="shop_video_upload' + counter + '" id="shop_video_upload_label' + counter + '"  style="display: none">Chọn video:</label><input type="file" id="shop_video_upload' + counter + '"\n' +
                    '                                                                      style="display: none"     name="shop_video_upload' + counter + '">\n' +
                    '</td>\n' +
                    '   <td id="id_image_td' + counter + '"><label for="id_image_upload' + counter + '" id="id_image_upload_label' + counter + '"  style="display: none">Chọn hình ảnh:</label><input type="file" id="id_image_upload' + counter + '"\n' +
                    '                                                                      style="display: none"     name="id_image_upload' + counter + '">\n' +
                    '</td>\n ' +
                    '<td id="biz_permit_td' + counter + '"><label for="biz_permit_upload' + counter + '" id="biz_permit_upload_label' + counter + '"  style="display: none">Chọn văn bản:</label><input type="file" id="biz_permit_upload' + counter + '"\n' +
                    '                                                                      style="display: none"     name="biz_permit_upload' + counter + '">\n' +
                    '</td>\n';

                $(common_part).hide().appendTo("#customer_type_table").fadeIn(1000);

                counter++;
            });
            for (var m = 2; m <= 10; m++) {
                let l = m;
                $(document).on('change', '#document_type' + (m), function () {
                    if ($(this).val() == 'shop_video') {

                        $("#shop_video_upload" + (l)).fadeIn(250).show();
                        $("#shop_video_upload_label" + (l)).fadeIn(250).show();
                        $("#id_image_upload" + (l)).hide();
                        $("#id_image_upload_label" + (l)).hide();
                        $("#biz_permit_upload" + (l)).hide();
                        $("#biz_permit_upload_label" + (l)).hide();
                        $("#shop_video_td" + (l)).fadeIn(250).show();
                        $("#id_image_td" + (l)).hide();
                        $("#biz_permit_td" + (l)).hide();
                    } else if ($(this).val() == 'id_image') {
                        $("#shop_video_upload" + (l)).hide();
                        $("#shop_video_upload_label" + (l)).hide();
                        $("#id_image_upload" + (l)).fadeIn(250).show();
                        $("#id_image_upload_label" + (l)).fadeIn(250).show();
                        $("#biz_permit_upload" + (l)).hide();
                        $("#biz_permit_upload_label" + (l)).hide();
                        $("#shop_video_td" + (l)).hide();
                        $("#id_image_td" + (l)).fadeIn(250).show();
                        $("#biz_permit_td" + (l)).hide();
                    } else if ($(this).val() == 'biz_permit') {
                        $("#shop_video_upload" + (l)).hide();
                        $("#shop_video_upload_label" + (l)).hide();
                        $("#id_image_upload" + (l)).hide();
                        $("#id_image_upload_label" + (l)).hide();
                        $("#biz_permit_upload" + (l)).fadeIn(250).show();
                        $("#biz_permit_upload_label" + (l)).fadeIn(250).show();
                        $("#shop_video_td" + (l)).hide();
                        $("#id_image_td" + (l)).hide();
                        $("#biz_permit_td" + (l)).fadeIn(250).show();

                    }
                });

            }
            $(document).on('click', '.removeThis', function () {
                $('#addButton').appendTo($('#TextBoxesGroup'));
                $(this).parent().parent().fadeOut(250, function () {
                    this.remove();
                });
            });

            $("#getButtonValue").click(function (e) {
                if ($('#contact_method' + (counter - 1) + ' option:selected').val() == '' || $('#contact_status' + (counter - 1) + ' option:selected').val() == '') {
                    alert('Hoàn thành ghi chú trước khi cập nhật');
                    return false;
                }
                var contract_id = $('#note_contract_id').val();
                var notes = [];
                for (i = 1; i < counter; i++) {
                    var note = {};
                    var method = $('#contact_method' + i).val();
                    var has_due_date = $('#due_date_checkbox' + i).val();

                    note.contact_method = $('#contact_method' + i).val();
                    if (method == 'phone') {
                        note.contact_status = $('#phone_contact_status' + i).val();
                    }
                    if (method == 'facebook') {
                        note.contact_status = $('#facebook_contact_status' + i).val();
                    }
                    if (method == 'zalo') {
                        note.contact_status = $('#zalo_contact_status' + i).val();
                    }
                    if (has_due_date == 'check') {
                        var browser = detectBrowser();
                        if (browser == 'Firefox' || browser == 'IE') {
                            note.due_date = $('#repayment-due-date' + i).val() + 'T00:00';
                        } else {
                            note.due_date = $('#repayment-due-date' + i).val();
                        }
                    }


                    notes.push(note);
                    // if (counter > 5) {
                    //     break;
                    // }
                    var operator_note = $('#note1').val();
                }
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });


                jQuery.ajax({
                    url: "{{URL::route('services.create-customer-type')}}",
                    method: 'post',
                    data: {
                        notes: notes,
                        contract_id: contract_id,
                        operator_note: operator_note

                    },
                    success: function (result) {
                        $('#repayment-note-close-btn-' + contract_id).trigger('click');
                    }
                });

            });
        })

    </script>
@endsection
