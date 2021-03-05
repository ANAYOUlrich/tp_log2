                    $(".alert").remove();
                    if(data.success){

                        var html = `<div id="alert" class="alert alert-success background-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                        </button>
                                        <p>${data.success}</p>
                                    </div>`

                        $("#entete").after(html);
                        $('#alert').focus();
                    };

                    if(data.error){
                        var html = `<div id="alert" class="alert alert-danger background-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                        </button>
                                        <p>${data.error}</p>
                                    </div>`
                        $("#entete").after(html);
                        $('#alert').focus();
                    };