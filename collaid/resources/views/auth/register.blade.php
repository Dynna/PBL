@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            color: black;
        }

        .reg-container {
            display:flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            width: 325px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .sign-text {
            text-align: center;
        }

        .sign-text h1 {
            font-size: 48px;
        }

        .sign-text p {
            font-size: 18px;
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 60px;
        }

        .form-group label {
            color: black;
            opacity: 0.8;
            font-weight: 300;
            font-size: 18px;
        }

        .form-controller {
            width: 100%;
            border: none;
            border-bottom: 1px  solid;
        }

        .form-controller:focus {
            outline: none;
        }

        .sign-button {
            width:100%;
            margin-top: 20px;
            height: 50px;
            border: none;
            background-color: #AABCBF;
            color: #808080;
            font-weight: 500;
        }

        .sign-button:hover {
            color: #ffffff;
        }

        .license-agreement {
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .license-agreement label {
            color: black;
            opacity: 0.8;
            font-weight: 300;
            font-size: 18px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            margin-top: 20px;
            max-height: calc(100vh - 210px);
            overflow-y: auto;
            font-family: 'Raleway', sans-serif;
            color: black;

        }


        /* The Close Button */
        .close1 {
            background: #AABCBF;
            color: #808080;
            font-weight: 500;
            width: 80px;
            height: 40px;
            float: right;
            border: none;
            outline: none;
        }

        .close1:hover {
            color: #ffffff;
        }

        #agreePolicesBtn, #agreePolicesBtn1 {
            background: none;
            border: none;
            outline: none;
            font-size: 18px;
            color: #337ab7;
            cursor: pointer;
        }

        .register-container li {
            list-style-type: disc;
        }

        span {
            font-weight: bold;
        }

    </style>
    <div class="reg-container">
        <div class="register-container">
            <div class="sign-text">
                <h1>Sign Up</h1>
                <p>Already a member?
                    <a href="{{ url('/login') }}">Sign in</a>
                </p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="first_name">{{ __('First name') }}</label>
                    <input id="first_name" type="text" class="form-controller @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="last_name">{{ __('Last name') }}</label>
                    <input id="last_name" type="text" class="form-controller @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-controller @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-controller @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-controller" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="license-agreement">
                    <input type="checkbox" id="agreement-check" name="agreement-checking" value="agreement" required>
                    <label>I agree to the </label>
                    <button id="agreePolicesBtn">Terms and Conditions</button>
                </div>


                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
{{--                        <span class="close">&times;</span>--}}
                        <h1>Terms and Conditions</h1>
                        <hr>
                        <p><span>Use of this website implies your full acceptance of these Terms of Use.
                            Please read our Terms of Use carefully before using collaid.com.</span></p>

                        <h3>1. Agreement</h3>
                        <p>In consideration of collaid.com (the "Website", which includes without limitation all web content and underlying software and technology)
                            providing you with the content and services available through the Website www.collaid.com (the "Service"), you acknowledge and agree to
                            comply with these Terms of Use ("Terms of Use" or the "Agreement").
                            If you do not agree to the terms and conditions contained in the Terms of Use, you may not become a member of the Service,
                            and Collaid ("we", "us", or "Collaid") does not consent to provide you with access to the Service.
                            Please review these Terms of Use, by which we provide services, which is a binding license agreement that governs your use of this Website.
                            By using or visiting this Website, whether you are a registered member or non-member, you agree to these Terms
                            of Use and our Privacy Policy ("Privacy Policy").
                            "Use" of or "using" this Website or Services includes, without limitation, navigating to or between our webpages, clicking any items
                            on webpages, inputting information, or partaking in our Services in any way.</p>
                        <p><span>You must be at least 18 years of age to use the Services provided by this Website.</span>
                            By using our Services you are confirming that you are at least 18 years of age and legally eligible to enter into a contract.</p>

                        <h3>2. The Service</h3>
                        <p>Collaid is a web application for every person in need for a project partner.
                            This application will ease the process of finding people who share the same visions, ideas and motivation to develop,
                            implement and contribute to a certain idea or project. However, we have several features (e.g. authentication, log in,
                            communicating through network) that require confidentiality, integrity and availability. Therefore, the key factor of our
                            application is not as much sharing and collaboration,
                            as making sure all data which will be worked with will be secure enough to maintain a healthy workspace for every user. </p>

                        <h3>3. Registration and Termination</h3>
                        <p>In order to gain access to the Service, you must become a member of the Website by choosing a unique (and inoffensive) username
                            and password and providing us with true, accurate, current, and complete information about yourself as required on the Registration page.</p>
                        <p>If you are already a member of the Website, you may use the username and password you chose when you registered for membership.
                            If the information you provide is untrue, inaccurate, incomplete, or outdated, or we have reasonable grounds to suspect that it is,
                            we have the right to suspend or terminate your membership and to prohibit your current or future use of the Service.
                            You understand and agree that the Website may, under certain circumstances and without prior notice to you, terminate your access
                            to and use of the Service.
                            Cause for such termination shall include, but is not be limited to:
                            (i) breaches or violations of the Agreement or other agreements or guidelines;
                            (ii) requests by law enforcement or other government or regulatory authorities; or
                            (iii) technical difficulties.</p>

                        <h3>4. Privacy</h3>
                        <p>In addition to the terms of this Agreement, our policy regarding the collection and use of your personal information
                            is set forth in more detail in our Privacy Policy. However, we reiterate here that the security of your personal information is important to us.
                            We follow generally accepted industry standards to protect the personal information submitted to us.</p>

                        <h3>5. License to Use</h3>
                        <p>Collaid grants members a limited, personal, non-exclusive, non-transferable license to use our forms and posts for your own personal
                            or internal business use.
                            Except as provided herein, you agree not to resell, modify, copy, create derivative works of, alter, enhance, or in
                            any way exploit any of the products, Services, or technology from the Website in any manner, except for modifications in
                            filling out the forms for your authorized use, without the express written consent of Collaid.
                            You shall not violate copyright restrictions by removing any copyright notice from any form.</p>

                        <h3>6. User Conduct</h3>
                        <p>As a user, you understand and agree that all data, graphics, information, messages, or other materials,
                            whether published, displayed, or transmitted by you, are your sole responsibility.</p>
                        <p>You agree to act responsibly and treat other Website members with respect. As a registered member, you agree not to:</p>
                        <ul>
                            <li>violate any applicable local, state, provincial, regional, national, or international laws, statutes, and/or codes;</li>
                            <li>transfer or re-sell your use of or access to the Service to any third party;</li>
                            <li>email, make available, post, upload, or transmit any content that is abusive, harassing,
                                harmful, threatening, unlawful, violates another party's rights (including, but not limited to, intellectual property
                                rights and rights of privacy and publicity), or is otherwise objectionable or that you do not have a written right to transmit
                                under any law or under any contractual agreement or relationship;</li>
                            <li>provide inaccurate, misleading, or false information to us or to any other member.
                                You agree to promptly notify us if any information provided to us or another member subsequently becomes inaccurate, misleading, or false;</li>
                            <li>transmit any chain letters or junk email or otherwise abuse the services and facilities provided to you;</li>
                            <Li>restrict or inhibit any other visitor from using the Service, including, without limitation, by means of "hacking"
                                or defacing any portion of the Website;</Li>
                            <li>express or imply that any statements you make are endorsed by us without our prior written consent;</li>
                            <Li>modify, adapt, sublicense, translate, sell, reverse engineer, decompile, or disassemble any portion of the Service
                                or any part of the Website;</Li>
                            <li>"frame" or "mirror" any content available through the Service or any part of our Website without our prior written consent;</li>
                            <li>use any robot, spider, site search/retrieval application, or other manual or automatic device or process to download,
                                retrieve, index, "data mine", or in any way reproduce or circumvent the navigational structure or presentation of the
                                content available through the Service or any part of the Website;</li>
                            <li>harvest or collect information about users of the Service without their express consent.</li>
                        </ul>
                        <p>You are solely responsible for maintaining the confidentiality of your password and for all activities that occur under your
                            username and password. You are fully responsible for all use of your account and for any actions that take place using
                            your account, including content posted in public areas or private email messages. You agree to notify us at pass.application.test@gmail.com
                            if you become aware of any possible unauthorized use(s) of your account or any possible breach of security, including loss, theft, or unauthorized
                            disclosure of your username or password</p>

                        <h3>7. Communicating Publicly</h3>
                        <p>The Website may contain services that enable you to communicate to members of the Website or the public.
                            You agree not to use such communication services in any prohibited way.
                            Prohibited uses include: offering to sell or buy anything, attempting to violate or violating the legal rights of others including their
                            rights concerning use of this Website, posting profane or obscene materials, uploading files that you do not have the intellectual property
                            rights over or files that may cause harm, privacy violations, or causing undesirable effects to other's computers.
                            You agree that Collaid may remove any of your communications without notice, whether or not we believe that your
                            communications violate the Terms of Use.
                            Collaid does not review all content that is posted on the Website by its users.
                            Therefore, Collaid may not be held liable based on your conduct or the conduct of others that use its communication services.
                            Be sure to use care in using such services and never give out personal information that could be used to identify you to others.</p>

                        <h3>8. Communication Policy</h3>
                        <p>Collaid, may from time to time send you messages regarding the service and to advise you of updates,
                            notices regarding your account, and new products/offers via email, SMS, or direct message into your message box on your personal profile.
                            You may at any time exercise your option not to receive such notifications.</p>

                        <h3>9. Links to Third-Party Websites</h3>
                        <p>You will find links to third-party websites on our Website.
                            These websites have their own privacy policies that you should check.
                            Collaid does not accept any responsibility or liability for their policies whatsoever, or the consequences of visiting
                            such sites through the links provided in our site, as Collaid has no control over third-party websites.</p>

                        <h3>10. Removal of Content</h3>
                        <p>We reserve the right to remove any material on the Website that is unlawful, threatening, abusive, libellous, defamatory,
                            obscene, vulgar, profane, indecent, or otherwise objectionable to us at our sole discretion.</p>

                        <h3>11. Proprietary Rights</h3>
                        <p>We own and retain proprietary rights in our Services and Website, which includes all of our copyrighted material, trademarks, and
                            other proprietary information. Members may access and use the content, and download and/or print out one copy of any content from the Service,
                            solely for your personal, non-commercial use. You acknowledge that you do not acquire any ownership rights by using the Service.
                            By posting information or content, you automatically grant to us, and you represent and warrant that you have the right to grant to us,
                            an irrevocable, perpetual, non-exclusive, worldwide license to use, copy, publicly perform, publicly display, and distribute such information and content;
                            to prepare derivative works of, or incorporate into other works, such information and content; and to authorize sub-licenses of the foregoing.</p>
                        <p>The Collaid logo, and other marks are trademarks and/or service marks. All other trademarks, service marks, and logos used on the Website are the
                            trademarks, service marks, or logos of their respective owners. Use of our trademarks, service marks, or logos requires explicit written permission.</p>
                        <p>Collaid is the copyright owner of all text and graphics, software, proprietary technology, legal documents, and forms provided on the Website.
                            The information, content, organization, and structure of any such previews are all copyrighted, proprietary material owned by Collaid.
                            Any violation of our copyright on such previews by members or non-members is strictly prohibited.</p>

                        <h3>12. Limitation of Liability</h3>
                        <p>We do not: (i) guarantee the accuracy, completeness, or usefulness of any information provided; or
                            (ii) adopt, endorse, or accept responsibility for the accuracy or reliability of any opinion,
                            advice, or statement made by any party. The information and Services contained on the Website may
                            contain inaccuracies and typographical errors.
                            Do not rely on our information or Services for legal, or other advice, but in all cases we recommend consulting
                            with the appropriate professional concerning your particular circumstances. Under no circumstances will we be responsible
                            for any loss or damage resulting from anyone's reliance on information or other content posted on the Website, or transmitted
                            to or by any members. </p>
                        <p>Your sole remedy for dissatisfaction with the Service is to stop using it.
                            The sole and exclusive maximum liability to Collaid for all damages, losses, and causes of action—whether
                            in contract, tort (including, without limitation, negligence), or otherwise—shall be the total amount paid to
                            us by you, if any, for access to the Service.</p>
                        <p>Collaid and any of their agents, affiliates, representatives, employees, principals, business associates and their affiliates, partners, or independent contractors are not responsible for any losses or profits that may result from the use of information contained within this Website and/or the Service.</p>

                        <h3>13. Indemnity</h3>
                        <p>In this paragraph you agree to assume liability for any third-party claims against Collaid that may arise due to your actions.
                            You agree to defend, hold harmless, and indemnify us from and against any and all claims of any kind, damages, costs, debt, losses,
                            liabilities, obligations, injuries, and expenses, including reasonable attorney's fees and costs arising from your use of and access to the Website;
                            any violation by you of these Terms of Use; any violation by you of any third-party right; and any claim levied
                            against you that your submission caused damage to a third party.
                            You also agree to indemnify against and waive any rights to the contrary against Collaid for any claims that you or a third party may assert
                            based on your use of the website that are in existence at the time that you accept these Terms of Use but are either unknown or unsuspected at such time.</p>

                        <h3>14. Governing Law; Venue and Jurisdiction</h3>
                        <p>The Agreement shall be governed by, and construed in accordance with, the laws of the Republic of Moldova,
                            without regard to its conflict of law provisions. Each of the parties hereby knowingly, voluntarily, and intentionally waives
                            any right it may have to a trial by jury or class action in respect of any litigation.
                            We make no representation that materials provided through the Service are appropriate or available for use in all locations.
                            Those who choose to access the Service do so on their own initiative and at their own risk and are responsible for compliance
                            with local laws if and to the extent applicable. We reserve the right to limit the availability of the Service to any person, geographic area,
                            or jurisdiction we so desire, at any time and at our sole discretion, and to limit the quantities of any such service or product that we provide.
                            This agreement to arbitrate shall survive the termination of these Terms of Use.</p>
                        <p>Before filing an arbitration demand, you agree to provide notice to Collaid of your dispute.</p>

                        <h3>15. Modification of This Agreement</h3>
                        <p>These Terms of Use may be modified by us from time to time to include changes to the Service, such as eliminating or discontinuing
                            any content or feature of the Service or changes in fees, charges, or other conditions for use of the Service.
                            Any modification we make to these Terms of Use will be effective seven (7) days after notice of any change is provided
                            to you and may be done by means including, but not limited to, a posting on this Website or via email.
                            Your use of the Service after such notice will be deemed acceptance of such modifications. If you do not agree with these Terms of Use,
                            please do not use this Site. Please check the Website frequently to view recent changes. If you subscribe to a plan, you must give thirty (30) days'
                            notice of your intent to reject the modifications and terminate your subscription within seven (7) days of the modification, after which your
                            continued use of the Website shall be considered acceptance of the modification.</p>

                        <h3>16. Miscellaneous</h3>
                        <p>If any provision of the Terms of Use is found to be unlawful, void, or for any reason unenforceable,
                            then that provision shall be deemed severable from the Terms of Use and shall not affect the validity and enforceability
                            of any remaining provisions. No waiver by either party of any breach or default hereunder shall be deemed to be a
                            waiver of any preceding or subsequent breach or default. Any heading, caption, or section title contained in the Terms
                            of Use is inserted only as a matter of convenience and in no way defines or explains any section or provision hereof. </p>
                        <p>As a registered member of the Service, you agree that this posted Agreement puts you on notice and serves as your
                            electronic signature verifying your full agreement to the Terms of Use.</p>
                        <hr>
                        <P>Use of this site does not establish attorney-client relationship. Use of Collaid is subject to our Terms of Use and Privacy Policy.</P>
                        <hr>
                        <h1>Privacy Policy</h1>
                        <hr>

                        <h3>Collection and Use of Personal Information</h3>
                        <p><span>We collect the following personal information from you:</span></p>
                        <ul>
                            <li>Contact information such as name, email address, mailing address;</li>
                            <li>Unique identifiers such as username, account number, and password.</li>
                        </ul>
                        <p><span>We use this information to:</span></p>
                        <ul>
                            <li>send you an email confirmation when you register;</li>
                            <li>change password in case you forgot it;</li>
                            <li>provide accessibility for other users to contact you.</li>
                        </ul>

                        <h3>Information Sharing</h3>
                        <p>When using our website, any information you provide when you register or login will be kept strictly confidential.</p>
                        <p>If you are having trouble logging in to your account or need a new password, we can only contact you via the email address associated with your account. We will never give your password out over the phone. This means it is important that the email address you provide is valid and will not block emails from Collaid.

                            Collaid will not use or disclose sensitive personal information, such as race, religion, or political affiliations, without
                            your explicit consent.</p>
                        <p><span>We may also disclose your personal information under the following circumstances:</span></p>
                        <ul>
                            <li>As required by law such as to comply with a subpoena or similar legal process;</li>
                            <li>When we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others,
                                investigate fraud, or respond to a government request.</li>
                        </ul>
                        <h3>Security</h3>
                        <p>The security of your personal information is important to us.
                            We follow generally accepted industry standards to protect the personal information submitted to us,
                            both during transmission and once we receive it. No method of transmission over the Internet, or method of electronic storage,
                            is 100% secure, however. Therefore, we cannot guarantee its absolute security. If you have any questions about security on our website,
                            you can contact us at pass.application.test@gmail.com.</p>

                        <h3>Correcting and Updating Your Personal Information</h3>
                        <p>To review and update your personal information to ensure it is accurate, contact us at pass.application.test@gmail.com.</p>

                        <h3>Minors</h3>
                        <p>Collaid does not knowingly gather personal information from minors under the age of eighteenth.
                            We ask that minors under the age of thirteen only use our website with permission and supervision of a parent or guardian.</p>

                        <h3>Notification of Privacy Statement Changes</h3>
                        <p>We reserve the right to update this privacy statement at any time to reflect changes to our information practices.
                            If we make any material changes, then we may notify you by email (sent to the email address specified in your account)
                            or by posting the change on this privacy policy page and indicating the date of the most recent change.
                            We encourage you to periodically review this page for the latest information on our privacy practices.</p>

                        <h3>Contact Information</h3>
                        <p>You can contact us about this privacy statement by emailing us at the address below:</p>
                        <p>Collaid</p>
                        <p>Email: pass.application.test@gmail.com</p>

                        <button class="close1">Close</button>
                    </div>

                </div>



                @if(env('GOOGLE_RECAPTCHA_KEY'))
                    <div class="g-recaptcha"
                         data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                    </div>
                @endif

                <div class="button">
                    <button type="submit" class="sign-button">
                        {{ __('Sign Up') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btnModal = document.getElementById("agreePolicesBtn");

        // Get the <span> element that closes the modal
        var closeModalBtn = document.getElementsByClassName("close1")[0];

        // When the user clicks the button, open the modal
        btnModal.onclick = function() {
            modal.style.display = "block";
        }


        closeModalBtn.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
@endsection

