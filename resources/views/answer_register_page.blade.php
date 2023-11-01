<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Acwa Power</title>
    <link rel="shortcut icon" href="{{asset('image/Logo.png')}}" type="image/svg"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('CSS/style.css')}}"/>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
<!-- Submitter Form  Start -->
<section class="logo" style="
        padding-top: 30px;
        padding-bottom: 30px;     ">
    <a href="{{route('index-page')}}" style="display: flex; justify-content: center; width: 22%;"><img class="logo-img"
                                                                                                       src="{{asset('image/ACWA_Power_logo.png')}}"
                                                                                                       alt="Acwa Power"
                                                                                                       style="width: 100%;"/></a>

</section>
<section class="sectiontitle">
    <div>
        <div class="submitter" style="
          font-family: 'Open Sans';
          font-size: 20px;
          font-weight: 700;
          color: #015b96;
          line-height: 38.13px;
        ">
            Submitter Details
        </div>
        <div class="submitter" style="
          font-family: 'Open Sans';
          font-size: 16px;
          font-weight: 700;
          color: #e60101;
          line-height: 29.96px;
          padding-bottom: 15px;
        ">
            All fields are mandatory(*)
        </div>
    </div>
    <div class="form-section">
        <form id="submitterForm" class="validated">
            <div class="form-group">
                <div class="form-row">
                    <label for="name" class="placholder"> Name</label>
                    <input type="text" id="sd_name" value="{{old('sd_name')}}" name="sd_name" required/>
                </div>
                <div class="form-row">
                    <label class="placholder" for="contact">Contact Number</label>
                    <input type="tel" id="sd_contact_number" value="{{old('sd_contact_number')}}"
                           name="sd_contact_number" oninput="validateNumeric(event)" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <label class="placholder" for="email">Email</label>
                    <input type="email" id="sd_email" value="{{old('sd_email')}}" name="sd_email" required/>
                    <div id="emailValidationMessage"></div>
                </div>
                <div class="form-row">
                    <label class="placholder" for="occupation">Company /University</label>
                    <input type="text" id="sd_company_university" value="{{old('sd_company_university')}}"
                           name="sd_company_university" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <label class="placholder" for="country">Occupation</label>
                    <input type="text" id="sd_occupation" value="{{old('sd_occupation')}}" name="sd_occupation"
                           required/>
                </div>
                <div class="form-row">
                    <label class="placholder" for="university">Country</label>
                    <input type="text" id="sd_country" value="{{old('sd_country')}}" name="sd_country" required/>
                </div>
            </div>
        </form>
    </div>
    <div>
        <div class="idea" style="
          font-family: 'Open Sans';
          font-size: 22px;
          font-weight: 700;
          color: #015b96;
          line-height: 38.13px;
        ">
            Idea Details
        </div>
        <div class="submitter" style="
          font-family: 'Open Sans';
          font-size: 16px;
          font-weight: 700;
          color: #e60101;
          line-height: 29.96px;
          padding-bottom: 15px;
        ">
            All fields are mandatory(*)
        </div>
    </div>
    <div class="form-section">
        <form id="basic_information" class="validated">
            <div class="form-group">
                <div class="form-row">
                    <label for="name" class="placholder"> Title</label>
                    <input type="text" id="id_title" value="{{old('id_title')}}" name="id_title" required/>
                </div>
                <div class="form-row">
                    <label class="placholder" for="contact">Description</label>
                    <input type="text" id="id_description" value="{{old('id_description')}}" name="id_description"
                           required/>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row" style="margin-bottom: 50px;">
                    <label class="placholder" for="email">Problem Statement</label>
                    <input type="text" id="id_problem_statement" value="{{old('id_problem_statement')}}"
                           name="id_problem_statement" required/>
                </div>
                <div class="form-row" style="margin-bottom: 50px;">
                    <label class="placholder" for="occupation">Proposed Solution</label>
                    <input type="text" id="id_proposed_solution" value="{{old('id_proposed_solution')}}"
                           name="id_proposed_solution" required/>
                </div>
            </div>
            <div class="media" style="display: flex; justify-content: space-evenly;">
                <div class="checkbox-mobile">
                    <div class="categorycheck">Category</div>
                    <div class="pcategory">
                        <input type="checkbox" id="product" name="id_category" value="product"
                               onchange="toggleCheckboxes1('product')">
                        <label for="product">Product</label>
                    </div>

                    <div class="pcategory">
                        <input type="checkbox" id="service" name="id_category" value="service"
                               onchange="toggleCheckboxes1('service')">
                        <label for="service">Service</label>
                    </div>

                    <div class="pcategory">
                        <input type="checkbox" id="technology" name="id_category" value="technology"
                               onchange="toggleCheckboxes1('technology')">
                        <label for="technology">Technology</label>
                    </div>
                </div>
                <div class="checkbox-mobile">
                    <div class="categorycheck">Stage of Idea</div>
                    <div class="pcategory">
                        <input type="checkbox" id="concept" name="id_stage_of_idea" value="concept"
                               onchange="toggleCheckboxes2('concept')">
                        <label for="product">Ideation/Concept</label>
                    </div>

                    <div class="pcategory">
                        <input type="checkbox" id="pilot" name="id_stage_of_idea" value="pilot"
                               onchange="toggleCheckboxes2('pilot')">
                        <label for="service">Pilot</label>
                    </div>

                    <div class="pcategory">
                        <input type="checkbox" id="development" name="id_stage_of_idea" value="development"
                               onchange="toggleCheckboxes2('development')">
                        <label for="technology">Development</label>
                    </div>
                </div>
                <div class="checkbox-mobile">
                    <div class="categorycheck">Type of Idea</div>
                    <div class="pcategory">
                        <input type="checkbox" id="newidea" name="id_type_of_idea" value="newidea"
                               onchange="toggleCheckboxes3('newidea')">
                        <label for="product">New Idea</label>
                    </div>

                    <div class="pcategory">
                        <input type="checkbox" id="idea" name="id_type_of_idea" value="idea"
                               onchange="toggleCheckboxes3('idea')">
                        <label for="service">Enhancing an existing idea</label>
                    </div>
                </div>
                <div class="checkbox-mobile">
                    <div class="categorycheck">Sector/Technology /Focus Area</div>
                    <div class="pcategory">
                        <input type="checkbox" id="energy" name="id_sector_tech_area[]" value="energy">
                        <label for="product">Renewable Energy</label>
                    </div>

                    <div class="pcategory">
                        <input type="checkbox" id="desalination" name="id_sector_tech_area[]" value="desalination"
                               required>
                        <label for="service">Desalination</label>
                    </div>

                    <div class="pcategory">
                        <input type="checkbox" id="hydrogen" name="id_sector_tech_area[]" value="hydrogen">
                        <label for="technology">Green Hydrogen</label>
                    </div>
                    <div class="pcategory">
                        <input type="checkbox" id="storage" name="id_sector_tech_area[]" value="storage">
                        <label for="technology">Energy Storage</label>
                    </div>
                    <div class="pcategory">
                        <input type="checkbox" id="digitalization" name="id_sector_tech_area[]" value="digitalization">
                        <label for="technology">Digitalization</label>
                    </div>
                    <div class="pcategory">
                        <input type="checkbox" id="others" name="id_sector_tech_area[]" value="others"
                               onchange="toggleInputBox()">
                        <label for="technology">Other, please specify</label>
                    </div>
                    <div style="padding-bottom: 50px;">
                        <label for="otherInput"></label>
                        <input type="text" class="OtherInputclass" value="{{old('id_sector_tech_area_remark')}}"
                               id="id_sector_tech_area_remark" name="id_sector_tech_area_remark" disabled
                               style="height: 50px; color: #000000; background-color:#dde8f0; border-radius: 8px; border: 1px solid #015b96">
                    </div>
                </div>
            </div>
            <div class="objectivecheck"><strong> Idea Objective: Please Specify</strong></div>
            <div class="ocategory">
                <input type="checkbox" id="process" name="id_idea_objective" value="process"
                       onchange="toggleCheckboxes4('process')">
                <label for="product">Solving a problem/process</label>
            </div>

            <div class="ocategory">
                <input type="checkbox" id="system" name="id_idea_objective" value="system"
                       onchange="toggleCheckboxes4('system')">
                <label for="service">Advancing a current system</label>
            </div>

            <div class="ocategory">
                <input type="checkbox" id="other" name="id_idea_objective" value="other"
                       onchange="toggleCheckboxes4('other')">
                <label for="technology">Other, please specify</label>
            </div>

            <div class="ocategory">
                <label for="otherInput2"></label>
                <input type="text" class="OtherInputclass1" id="id_idea_objective_remark"
                       name="id_idea_objective_remark" disabled
                       style="height: 50px; color: #000000; background-color:#dde8f0 ; border-radius: 8px; border: 1px solid #015b96">
            </div>
            <div class="backbutton" style="padding-inline: 30px;">
                <div class="submit-btn">
                    <button type="button" onclick="goback2()"
                            style="border-radius: 8px; font-size: 22px; display:flex; justify-content: center; align-items: center; gap:5px">

                        Back
                    </button>
                </div>
                <div class="submit-btn">
                    {{--                    <input type="submit" value="Test">--}}
                    <button type="submit" id="step_one"
                            style="border-radius: 8px; font-size: 22px; display:flex; justify-content: center; align-items: center; gap:5px">
                        Proceed to Evaluation Criteria Description <img class="icon-logo"
                                                                        src="{{asset('image/icon.png')}}"
                                                                        alt="Acwa Power" style="align-items: center;"/>
                    </button>
                </div>
            </div>
    </div>
    </form>
    </div>
</section>
<!-- Submitter form end  Start -->

<!-- Evaluation Criteria Description Start -->
<section class="form-section-ecd" style="display: none;">
    <div class="evaluation"
         style="font-family: 'Open Sans'; font-size: 24px; font-weight: 800; color: #015b96; line-height: 38.13px; text-align: center; text-decoration: underline;">
        Evaluation Criteria Description
    </div>
    <div class="form-sectioneva">
        <form id="evaluationDetailsForm">

            <div class="evalution" style="
          font-family: 'Open Sans';
          font-size: 20px;
          font-weight: 700;
          color: #015b96;
          line-height: 38.13px;
        ">
                <div id="criteria-description">
                    <!-- Existing content here -->
                </div>
                {{--                <div>Innovation:</div>--}}
                {{--                <div style="font-family: 'Open Sans';--}}
                {{--                                font-size: 18px;--}}
                {{--                                font-weight: 600;--}}
                {{--                                color: #000000;--}}
                {{--                                line-height: 35.41px;">--}}
                {{--                    The level of novelty and ingenuity in the proposed solution.--}}
                {{--                </div>--}}
                {{--                <div class="container">--}}
                {{--                    <textarea placeholder="Enter your text here" id="qs_innovation" name="qs_innovation"--}}
                {{--                              onkeyup="textAreaAdjust(this)"--}}
                {{--                              style="overflow:hidden" required>{{old('qs_innovation')}}</textarea>--}}
                {{--                    <!-- <p style="margin-left: 49rem; font-size: smaller; font-weight: 500;">Words left: <span id="wordsLeft">500</span></p> -->--}}
                {{--                </div>--}}
                <div class="backbutton">
                    <div class="submit-btn">
                        <button type="button" onclick="goback()"
                                style="border-radius: 8px; font-size: 22px; display:flex; justify-content: center; align-items: center; gap:5px">

                            Back
                        </button>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" id="step_two"
                                style="border-radius: 8px; font-size: 22px; display:flex; justify-content: center; align-items: center; gap:5px">
                            Proceed to Additional Evaluation Criteria <img class="icon-logo"
                                                                           src="{{asset('image/icon.png')}}"
                                                                           alt="Acwa Power"
                                                                           style="align-items: center;"/></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Evaluation Criteria Description End -->

<!--   Additional Evaluation Criteria Start -->
<section class="form-section-aec" style="display: none;">
    <div class="evaluation"
         style="font-family: 'Open Sans'; font-size: 24px; font-weight: 800; color: #015b96; line-height: 38.13px; text-align: center; text-decoration: underline;">
        Additional Evaluation Criteria
    </div>


    <div class="form-sectioneva">
        <form id="evaluationDetailsForm123" enctype="multipart/form-data">

            <div class="evalution" style="
        font-family: 'Open Sans';
        font-size: 20px;
        font-weight: 700;
        color: #015b96;
        line-height: 38.13px;
      ">
                <div id="evaluation-criteria">
                    <!-- Existing content here -->
                </div>
                <div style="color:#5C5B5B; font-weight: 800;">Optional:</div>
                <div style="font-family: 'Open Sans';
                              font-size: 18px;
                              font-weight: 400;
                              color: #5C5B5B;
                              line-height: 38.13px;">
                    1. Support the idea with the document and video (Video to not exceed more than 60 seconds. Please
                    mention your full name and contact information at the beginning of the video. The size to not exceed
                    8 MB)
                </div>
                <input type="file" id="fileInput1" name="attachment[]" multiple required>
                <div id="uploadedFiles"></div>
                <div id="image_validate" style="color: red;display: none">Combined file size exceeds 8 MB.</div>
                <div style="color: red" id="errorContainer"></div>
            {{--                                <div id="fileList" style="text-align: center; padding-top: 20px; padding-bottom: 40px;">--}}
            {{--                                    <label for="fileInput" class="uploadfile" style="--}}
            {{--                                        text-align: center;--}}
            {{--                                        color: #015B96;--}}
            {{--                                        font-family: 'Open Sans';--}}
            {{--                                        font-size: 20px;--}}
            {{--                                        font-weight: 800;--}}
            {{--                                        line-height: 38.13px;--}}
            {{--                                        width: 20%;--}}
            {{--                                        border-radius: 8px;--}}
            {{--                                        background-color: #dde8f0;;--}}
            {{--                                        border: 1px solid #015B96;--}}
            {{--                                        padding: 8px 60px;--}}
            {{--                                        cursor: pointer;--}}
            {{--                                        display:flex;--}}
            {{--                                        justify-content: center;--}}
            {{--                                        align-items: center;--}}
            {{--                                        gap:8px--}}
            {{--                                      ">--}}
            {{--                                        Upload--}}
            {{--                                        <img class="icon-logo" src="{{asset('image/file_upload.png')}}" alt="Acwa Power"--}}
            {{--                                             style="align-items: center;"/>--}}
            {{--                                    </label>--}}
            {{--                                    <input type="file" id="fileInput" name="attachment[]" style="display: none;" multiple>--}}
            {{--                                    <div id="uploadedFiles"></div>--}}
            <!-- Container for displaying uploaded files -->
            </div>
            <div style="color:#015B96; font-weight: 600;">
                <input type="checkbox" id="consentCheckbox" onchange="hideConsentMessage()" required>
                <label for="consentCheckbox">Consent:</label>
            </div>
            <div style="font-family: 'Open Sans';
                              font-size: 14px;
                              font-style: italic;
                              font-weight: 400;
                              color: #5C5B5B;
                              line-height: 29.96px;
                              padding-bottom: 20px;
                              ">

                By making a submission, you understand and agree that you are not claiming any patent, trademark,
                copyright, or other right in the submission. You represent that everything you submit is your own o
                riginal work, that you have all necessary rights to disclose
                it to us, and that you are not violating the rights of any third party. You agree to indemnify and
                hold us harmless from any claims, demands, damages, liabilities and costs (including legal fees)
                asserted by any third party relating
                in any way to your breach of a representation. If we enter into a development agreement and/or
                exclusivity arrangement, we will have a shared foreground Intellectual Property.
            </div>
            <div id="consentMessage" style="display: none; color: red; font-weight: 600; padding-bottom: 20px;">
                Please check the consent to submit the form.
            </div>
            <div class="backbutton">
                <div class="submit-btn submitback">
                    <button type="button" onclick="goback1()"
                            style="border-radius: 8px; font-size: 22px; display:flex; justify-content: center; align-items: center; ">
                        Back
                    </button>
                </div>
                <div class="submit-btn" style="padding-bottom: 40px;">
                    <button type="button" id="submit"
                            onclick="submitForm()" style="border-radius: 8px; font-size: 22px;">
                        Submit
                    </button>
                </div>
            </div>
    </div>
    </form>
    </div>
</section>


<script>
    function redirectToHomePage() {
        window.location.href = "index";
    }

    // Function to hide the consent message when the checkbox is clicked
    function hideConsentMessage() {
        const consentMessage = document.getElementById("consentMessage");
        consentMessage.style.display = "none";
    }
</script>
<script>
    const fileInput = document.getElementById('fileInput');
    const uploadedFilesContainer = document.getElementById('uploadedFiles');

    fileInput.addEventListener('change', handleFileUpload);

    function handleFileUpload(event) {
        const files = event.target.files;

        for (const file of files) {
            const fileItem = document.createElement('div');
            fileItem.className = 'uploaded-file';

            const fileName = document.createElement('span');
            fileName.textContent = file.name;

            const removeIcon = document.createElement('span');
            removeIcon.className = 'remove-icon';
            removeIcon.textContent = '❌'; // Cross icon
            removeIcon.addEventListener('click', () => removeUploadedFile(fileItem));

            fileItem.appendChild(fileName);
            fileItem.appendChild(removeIcon);
            uploadedFilesContainer.appendChild(fileItem);
        }

        fileInput.value = ''; // Clear the file input to allow uploading the same files again
    }

    function removeUploadedFile(fileItem) {
        uploadedFilesContainer.removeChild(fileItem);
    }
</script>

<script>
    function textAreaAdjust(element) {
        element.style.height = "1px";
        element.style.height = (25 + element.scrollHeight) + "px";
    }
</script>
</script>
<script>
    function validateNumeric(event) {
        const inputElement = event.target;
        const value = inputElement.value;
        const numericRegex = /^[0-9+]+$/;

        if (!numericRegex.test(value)) {
            // If the entered value contains non-numeric characters, remove them
            const cleanedValue = value.replace(/[^0-9+]/g, '');
            inputElement.value = cleanedValue;
        }
    }
</script>


<script>
    document.getElementById("other").addEventListener("change", toggleInputBox4);

    function toggleInputBox4() {
        const otherInput = document.getElementById("id_idea_objective_remark");
        const otherCheckbox = document.getElementById("other");
        otherInput.disabled = !otherCheckbox.checked;
    }
</script>
<script>
    function goback() {
        const submitterSection = document.querySelector('.sectiontitle');
        const ideaDetailsSection = document.querySelector('.form-section-ecd');
        submitterSection.style.display = 'block';
        ideaDetailsSection.style.display = 'none';
        window.scrollTo(0, 0);

    }
</script>
<script>
    function goback1() {
        const ecdDetailsSection = document.querySelector('.form-section-ecd');
        const aecDetailsSection = document.querySelector('.form-section-aec');
        ecdDetailsSection.style.display = 'block';
        aecDetailsSection.style.display = 'none';
        window.scrollTo(0, 0);

    }
</script>
<script>
    function goback2() {
        history.back();
        window.scrollTo(0, 0);
    }
</script>
<script>
    function proceedToIdeaDetails() {
        const submitterSection = document.querySelector('.sectiontitle');
        const ideaDetailsSection = document.querySelector('.form-section-ecd');
        submitterSection.style.display = 'none';
        ideaDetailsSection.style.display = 'block';
        window.scrollTo(0, 0);
    }
</script>
<script>
    function proceedToEvaluationDetails() {
        const ecdDetailsSection = document.querySelector('.form-section-ecd');
        const aecDetailsSection = document.querySelector('.form-section-aec');
        ecdDetailsSection.style.display = 'none';
        aecDetailsSection.style.display = 'block';
        window.scrollTo(0, 0);
    }
</script>

<script>
    function toggleCheckboxes1(selectedCheckbox) {
        const checkboxes = document.querySelectorAll('input[name="id_category"]');
        checkboxes.forEach(checkbox => {
            if (checkbox.id !== selectedCheckbox) {
                checkbox.checked = false;
            }
        });
    }
</script>
<script>
    function toggleCheckboxes2(selectedCheckbox) {
        const checkboxes = document.querySelectorAll('input[name="id_stage_of_idea"]');
        checkboxes.forEach(checkbox => {
            if (checkbox.id !== selectedCheckbox) {
                checkbox.checked = false;
            }
        });
    }
</script>
<script>
    function toggleCheckboxes3(selectedCheckbox) {
        const checkboxes = document.querySelectorAll('input[name="id_type_of_idea"]');
        checkboxes.forEach(checkbox => {
            if (checkbox.id !== selectedCheckbox) {
                checkbox.checked = false;
            }
        });
    }
</script>
<script>
    function toggleCheckboxes4(selectedCheckbox) {
        const checkboxes = document.querySelectorAll('input[name="id_idea_objective"]');
        checkboxes.forEach(checkbox => {
            if (checkbox.id !== selectedCheckbox) {
                checkbox.checked = false;
            }
        });
    }
</script>
<script>
    function toggleInputBox() {
        const otherInput = document.getElementById("id_sector_tech_area_remark");
        const othersCheckbox = document.getElementById("others");
        otherInput.disabled = !othersCheckbox.checked;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var emailInput = document.getElementById('sd_email');
        var emailValidationMessage = document.getElementById('emailValidationMessage');

        emailInput.addEventListener('blur', function () {
            var email = emailInput.value;

            if (email === '') {
                emailValidationMessage.innerHTML = 'Email id required';
                return;
            }

            // Make an AJAX request using Axios to the Laravel API endpoint
            axios.get('http://192.168.1.4/role-permissions-blog/public/api/check-email', {
                params: {
                    email: email
                }
            })
                .then(function (response) {
                    if (response.data.unique) {
                        emailValidationMessage.innerHTML = '';
                    } else {
                        emailValidationMessage.innerHTML = '<span style="color: red;">Email is already taken.</span>';
                    }
                })
                .catch(function (error) {
                    emailValidationMessage.innerHTML = '<span style="color: red;">An error occurred.</span>';
                });
        });
    });

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

{{--New Code--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var criteria_description = document.getElementById('criteria-description');
        var evaluation_criteria = document.getElementById('evaluation-criteria');
        $.ajax({
            type: 'GET',
            url: 'http://192.168.1.4/role-permissions-blog/public/api/answer_get',
            dataType: 'JSON',
            success: function (response) {
                var answers = response;
                answers.forEach(function (answer) {

                    var answerContent = `
                    <div id="${answer.lable_name}">
                    <div>
                        ${answer.lable_name}:
                    </div>
                    <div style="font-family: 'Open Sans'; font-size: 18px; font-weight: 600; color: #000000; line-height: 35.41px;">
                       ${answer.question}
                    </div>
                    <div class="container">
                        <textarea placeholder="Enter your text here" id="qs_${answer.id}" name="qs_${answer.id}"
                            onkeyup="textAreaAdjust(this)" style="overflow:hidden" required></textarea>
                    </div>
<button type="button" class="btn-danger"  onclick="removeElement('${answer.lable_name}')">Remove</button>

</div>
                `;
                    if (answer.type == 'criteria_description') {
                        criteria_description.innerHTML += answerContent;
                    } else {
                        evaluation_criteria.innerHTML += answerContent;
                    }
                });
            }
        });
    });

    function removeElement(id) {
        var confirmDelete = window.confirm('Are you sure you want to remove this element?');
        if (confirmDelete) {
            var element = document.getElementById(id);
            if (element) {
                element.remove();
            }
        }
        // var element = document.getElementById(id);
        // if (element) {
        //     element.remove();
        // }
    }
</script>


<script>
    $(document).on('click', '#step_one', function (e) {
        $('.validated').validate({
            rules: { //some rules for the input feilds },
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
                    // element.after("<span>" + error + "</span>"); // default error placement
                    element.after('<br>'.error); // default error placement
                }
            },
            submitHandler: function (form) {
                proceedToIdeaDetails();
            }
        });
        $('#basic_information').validate({
            rules: { //some rules for the input feilds },
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
                    // element.after("<span>" + error + "</span>"); // default error placement
                    element.after('<br>'.error); // default error placement
                }
            },
            submitHandler: function (form) {
                proceedToIdeaDetails();
            }
        });
    });
</script>
<script>
    $(document).on('click', '#step_two', function (e) {
        $('#evaluationDetailsForm').validate({
            rules: { //some rules for the input feilds },
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
                    // element.after("<span>" + error + "</span>"); // default error placement
                    element.after(error); // default error placement
                }
            },
            submitHandler: function (form) {
                proceedToEvaluationDetails();
            }
        });
    });
</script>
<script>
    jQuery(function ($) {


        //Validation
        // $("#submitterForm").validate({
        //     errorClass: "text-danger",
        //     // in 'rules' user have to specify all the constraints for respective fields
        //     rules: {
        //         sd_name: "required",
        //         sd_email: {
        //             required: "required",
        //             sd_email: true
        //         },
        //         sd_occupation: "required",
        //         sd_contact_number: "required",
        //         sd_company_university: "required",
        //         sd_country: "required",
        //         id_title: "required",
        //         id_description: "required",
        //         id_problem_statement: "required",
        //         id_proposed_solution: "required",
        //         id_category: "required",
        //         id_stage_of_idea: "required",
        //         id_type_of_idea: "required",
        //         id_sector_tech_area: "required",
        //         id_sector_tech_area_remark: "required",
        //         id_idea_objective: "required",
        //         id_idea_objective_remark: "required",
        //     },
        //     submitHandler: function(form) {
        //         form.submit();
        //     }
    });

    function submitForm() {
        // e.preventDefault();
        //  var validate = $("#submitterForm").valid();
        //   console.log(validate);

        $('#submit').validate({
            rules: { //some rules for the input feilds },
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
                    // element.after("<span>" + error + "</span>"); // default error placement
                    element.after('<br>'.error); // default error placement
                }
            },
            submitHandler: function (form) {
                submitForm();
            }
        });

        //Step One

        //   const eventTarget = e.target;
        var sd_name = $('#sd_name').val();
        var sd_email = $('#sd_email').val();
        var sd_occupation = $('#sd_occupation').val();
        var sd_contact_number = $('#sd_contact_number').val();
        var sd_company_university = $('#sd_company_university').val();
        var sd_country = $('#sd_country').val();
        var id_title = $('#id_title').val();
        var id_description = $('#id_description').val();
        var id_problem_statement = $('#id_problem_statement').val();
        var id_proposed_solution = $('#id_proposed_solution').val();

        //Category
        var product = document.getElementById('product');
        var service = document.getElementById('service');
        var technology = document.getElementById('technology');

        if (product.checked) {
            var id_category = $('#product').val();
        } else if (service.checked) {
            var id_category = $('#service').val();
        } else if (technology.checked) {
            var id_category = $('#technology').val();
        }

        //Stage Of Idea
        var concept = document.getElementById('concept');
        var pilot = document.getElementById('pilot');
        var development = document.getElementById('development');


        if (concept.checked) {
            var id_stage_of_idea = $('#concept').val();
        } else if (pilot.checked) {
            var id_stage_of_idea = $('#pilot').val();
        } else if (development.checked) {
            var id_stage_of_idea = $('#development').val();
        }

        //Type Of Idea
        var newidea = document.getElementById('newidea');
        var idea = document.getElementById('idea');
        if (newidea.checked) {
            var id_type_of_idea = $('#newidea').val();
        } else if (idea.checked) {
            var id_type_of_idea = $('#idea').val();
        }

        var id_sector_tech_area = [];
        $('input[name="id_sector_tech_area[]"]:checked').each(function (i) {
            id_sector_tech_area.push($(this).val());
        });
        var id_sector_tech_area_remark = $('#id_sector_tech_area_remark').val();

        //Idea Objective
        var process = document.getElementById('process');
        var system = document.getElementById('system');
        var other = document.getElementById('other');


        if (process.checked) {
            var id_idea_objective = $('#other').val();
        } else if (system.checked) {
            var id_idea_objective = $('#system').val();
        } else if (other.checked) {
            var id_idea_objective = $('#other').val();
        }
        var id_idea_objective_remark = $('#id_idea_objective_remark').val();

        //Step Two


        //Step Three

        var consentCheckbox = document.getElementById('consentCheckbox');

        if (consentCheckbox.checked) {
            var consent = 1;
        } else {
            var consent = 0;
        }

        // var attachment = $('#fileInput').prop('files')[0];


        const submitterForm = document.getElementById("submitterForm");

        //Image Size Validation
        const fileInput = document.getElementById('fileInput1');
        const files = fileInput.files;
        const maxSize = 8 * 1024 * 1024; // 8 MB in bytes
        let totalSize = 0;
        for (let i = 0; i < files.length; i++) {
            totalSize += files[i].size;
        }

        if (totalSize > maxSize) {
            $('#image_validate').show();
            // alert('Combined file size exceeds 8 MB.');
            return;
        } else {
            $('#image_validate').hide();
        }

        var errorContainer = document.getElementById('errorContainer');
        var validExtensions = ['doc', 'docx', 'xls', 'xlsx', 'csv',
            'pdf', 'ppt', 'txt', 'rtf', 'mp3', 'cad', 'psd', 'cdr', 'vsd', 'mp4'];

        errorContainer.innerHTML = ''; // Clear previous errors

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var extension = file.name.split('.').pop().toLowerCase();

            if (validExtensions.indexOf(extension) === -1) {
                errorContainer.innerHTML += '<p>' + file.name + ' is not a valid file.</p>';
            }
        }

        if (errorContainer.innerHTML === '') {
            var formData = new FormData(submitterForm);

            //Step One
            formData.append('sd_name', sd_name);
            formData.append('sd_email', sd_email);
            formData.append('sd_occupation', sd_occupation);
            formData.append('sd_contact_number', sd_contact_number);
            formData.append('sd_company_university', sd_company_university);
            formData.append('sd_country', sd_country);
            formData.append('id_title', id_title);
            formData.append('id_description', id_description);
            formData.append('id_problem_statement', id_problem_statement);
            formData.append('id_proposed_solution', id_proposed_solution);
            formData.append('id_category', id_category);
            formData.append('id_stage_of_idea', id_stage_of_idea);

            var selectedCheckboxes = document.querySelectorAll('input[name="id_sector_tech_area[]"]:checked');
            for (var i = 0; i < selectedCheckboxes.length; i++) {
                formData.append('id_sector_tech_area[]', selectedCheckboxes[i].value);
            }
            formData.append('id_type_of_idea', id_type_of_idea);
            formData.append('id_sector_tech_area_remark', id_sector_tech_area_remark);
            formData.append('id_idea_objective', id_idea_objective);
            formData.append('id_idea_objective_remark', id_idea_objective_remark);

            //Step Two
            $('textarea').each(function () {
                var textareaId = $(this).attr('id');
                var questionId = textareaId.split('_')[1]
                var textareaValue = $(this).val();

                // Add the value to the object using the textarea ID as the key
                // textareaValues[answerId] = textareaValue;
                formData.append('questionId[]', questionId);
                formData.append('textareaValue[]', textareaValue);
            });
       //     formData.append('textareaValues', textareaValues);


            //Step Three
            formData.append('consent', consent);

            var totalfiles = document.getElementById('fileInput1').files.length;
            for (var index = 0; index < totalfiles; index++) {
                formData.append("attachment[]", document.getElementById('fileInput1').files[index]);
            }
        }
        // console.log($('#fileInput1')[0].files)
        // if (validate==true) {
        if (consentCheckbox.checked) {
            $.ajax({
                type: 'POST',
                url: 'http://192.168.1.4/role-permissions-blog/public/api/answer_add_register_page',
                data: formData,
                processData: false,   // Prevent jQuery from processing data
                contentType: false,   // Prevent jQuery from setting contentType
                dataType: 'JSON',
                success: function (response) {
                    if (response.success == true) {
                        // Show success message
                        alert("Form data submitted successfully!");

                        // Reset the form
                        submitterForm.reset();
                        redirectToHomePage();

                        // Hide consent message
                        consentMessage.style.display = "none";
                    } else {
                        $('#pErr').text(response.result)
                    }
                }
                //     });
                // } else {
                //     return false;
                // }
            });

        }
    }

    // });
</script>


</body>

</html>
