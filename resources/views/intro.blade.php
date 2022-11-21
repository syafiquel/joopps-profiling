@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="p-5 bg-white rounded shadow mb-5">
                <!-- Rounded tabs -->
                <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                    <li class="nav-item flex-sm-fill">
                        <a id="about-tab" data-bs-toggle="tab" data-bs-target="#about" href="#about" role="tab" aria-controls="about" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">About Joopps</a>
                    </li>
                    <li class="nav-item flex-sm-fill">
                        <a id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Profiling Exercise</a>
                    </li>
                    <li class="nav-item flex-sm-fill">
                        <a id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" href="#contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Terms & Conditions</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div id="about" role="tabpanel" aria-labelledby="about-tab" class="tab-pane fade px-4 py-5 show active">
                        <p>JoOpps is being designed to be a fast, easy to use technology platform for you, the Candidate. Full focus is on supporting you secure a better understanding of yourself as an individual. At JoOpps, we believe that the future of recruitment is through 
                        effective videome crafting and application as well as securing a good perspective of your own attributes profile against specific roles. This will allow you to better gauge your innate strengths or attributes against specific roles..</p>
                        <p>JoOpps aspires to eventually create the ecosystem that will link you to employers, recruiters, employment aggregators as well as to personal brand consultants, trainers , coaches and other service providers who will play an integral role in supporting 
                        candidates in their quest for job opportunities whether it be full or part time or gig based. JoOpps aspires to reframe the recruitment sector by making it easy to use and more applicable to candidates and employers alike.”.</p>
                        <p>“Your Next Job, Our Passion</p>
                    </div>
                    <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                        <p><strong>This simple Exercise comprises a variety of questions which are designed to identify your attributes when you are considering your future job or roles. There is no right or wrong. All we require from you is for you to be truthful to yourself when responding. 
                        It is suggested that you slow down when you respond to the various questions. It should take you about 30 to 40 minutes to answer all questions. It is also recommended that you spend time to respond to the various questions in one sitting.</strong></p>
                        <p><strong>Instructions</strong></p>
                        <p>
                            <ul>
                                <li>Please assign a rating 1 to 7 to each statement below. Be as candid as you can with your rating as accuracy on your part will impact your overall scoring.</li>
                                <li>Review all statements with a level of objectivity and when you rate them, please do so with honesty.</li>
                                <li>Do not over think or over analyse the statement. &quot;Gut feel&quot; is usually the best response that you will have.</li>
                                <li>Use the scale to indicate how each statement applies to you.</li>
                            </ul>
                        </p>
                        <p><strong>The Rating Scale to be applied when responding to the statements</strong></p>
                        <p>1 - Strongly disagree</p>
                        <p>2 - Disagree</p>
                        <p>3 - Slightly disagree</p>
                        <p>4 - Neutral</p>
                        <p>5 - Slightly agree</p>
                        <p>6 - Agree</p>
                        <p>7 - Strongly Agree</p>
                        <p>Thank you in advance for taking the time to complete this Exercise.</p>
                        <p>Note: This Profiling Exercise has been crafted with close collaboration with Saito Business School. We thank them for the effort and support that they have provided to us.</p>
                    </div>
                    <div id="contact" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                        <p class="text-center"><strong>Terms of Use</strong></p>
                        <p><strong>Introduction</strong></p>
                        <ol>
                            <li>Welcome to JoOpps.com and JoOpps.io (collectively referred to as the &quot;Site&quot;), owned and operated by JoOpps Sdn Bhd (JoOpps).</li>
                            <li>JoOpps is committed to providing a safe and positive experience to all users on our Site. To help us do that, we need you to follow a few basic rules when you’re here. Don’t worry, it’s not very complicated.</li>
                            <li>It must also be understood up-front that all effort that is being put in by JoOpps is to provide you with the very best chance of securing a potential job by better understanding your attributes and by positioning yourself in a way that will portray
                                your true strengths, experiences and knowledge that you bring as an individual. In no way does JoOpps warrant to find you a job nor is there a guarantee that you will be invited for an interview with a potential employee. Instead, JoOpps is here to work
                                with you to give you the best possible chance in securing that all “elusive” job interview.</li>
                            <li>Also, by accessing JoOpps.com you agree to the following Terms of Use. These Terms of Use are effective as of 1 July 2021. We may update these Terms from time to time for legal and or regulatory reasons. All changes will be made known to you
                                via a suitable announcement on the Site. if you so wish not to accept the new terms as they come to effect, you should not continue to use the Site. If you do continue to use the Site after the date on which the changes come into effect, your use of the
                                Site will indicate and reflect you full agreement to be bound by the new Terms.</li>
                        </ol>
                        <p><strong>Registration</strong></p>
                        <ol>
                            <li>To register on the Site, you must be 18 years of age or above.</li>
                            <li>You must ensure that the details provided by you on registration or at any time are correct and complete.</li>
                            <li>You must inform us immediately of any changes to the information that you provided when registering by updating your personal details in order that we can communicate with you effectively.</li>
                        </ol>
                        <p><strong>Password and Security</strong></p>
                        <ol>
                            <li>When you register to use the Site you will be asked to create a password. In order to prevent fraud, you must keep this password confidential and must not disclose it or share it with anyone. If you know or suspect that someone else knows your password you should immediate change the same.</li>
                            <li>If JoOpps has reason to believe that there is likely to be a breach of security or misuse of the Site, we may require you to change your password or we may suspend your account all together.</li>
                        </ol>
                        <p><strong>Availability of the Site</strong></p>
                        <ol>
                            <li>Whilst we endeavour to offer you the very best service possible, we make no promise that the services at the Site will meet your requirements.</li>
                            <li>We do not guarantee that the Site will be fault-free, error-free, or that the Site and our associated servers are free of viruses or other harmful mechanisms. Should a fault occur with the Site, please report it to us and we will attempt to correct the fault as soon as we can.</li>
                            <li>Your access to the Site may be occasionally restricted to allow for repairs, regular maintenance or the introduction of new content, facilities or services. We will attempt to restore access and/or service as soon as we reasonably can.</li>
                        </ol>
                        <p><strong>You use of the Site</strong></p>
                        <ol>
                            <li>JoOpps hereby grants you a limited, terminable, non-exclusive right to access and use the Site only for your personal use and/or employment purposes.</li>
                            <li>In using the Site, you agree to comply with all applicable laws including the Laws of Malaysia.</li>
                            <li>You agree not to use the Site for any of the following:</li>
                            <ol type="a">
                                <li>disseminate any unlawful, harass, be libelous, abusive, threatening, harmful, vulgar, obscene, or otherwise objectionable material or otherwise breaching any laws;</li>
                                <li>aggregate, copy or duplicate in any manner any of the JoOpps çontent or information available from the Site, including profiles and data of candidates and other relevant information;</li>
                                <li>reproduce any of the JoOpps’s content for general use;</li>
                                <li>threaten, harass, stalk, defame, or defraud any person or entity;</li>
                                <li>violate copyright, trademark, or other intellectual property laws of JoOpps;</li>
                                <li>advertise, promote, endorse, or market, directly or indirectly, any third-party commercial products, services, solutions, or other technologies;</li>
                                <li>transmit material that will or encourages an act that constitutes a criminal offence, or otherwise breaches any applicable laws, regulations or code of practice;</li>
                                <li>send deceptive or false source-identifying information, including “spoofing” or “phishing.”</li>
                                <li>interfere with any other person’s use or enjoyment of the Site;</li>
                                <li>resell or assign your rights and or obligations under these Terms to any 3rd party;</li>
                                <li>to make any unauthorized commercial use of the Site;</li>
                                <li>attack, abuse, interfere with, intercept, disrupt, or exploit any users, systems, or services, regardless of how accomplished and notwithstanding anything to the contrary in these Terms, including but not limited to Denial of Service
                                    (DoS), monitoring, crawling, spamming, using bots or scripts, or distributing malware (such as viruses, Trojan horses, worms, spyware, or adware).</li>
                                <li>authorize, permit, enable, induce, or encourage any third party to do any of the above.</li>
                            </ol>
                            <li>If you violate these Terms, your access to the Site may be terminated immediately and without notice.</li>
                            <li>In other words, just be respectful and use the Site for its intended purpose.</li>
                        </ol>
                        <p><strong>Abusing the Site</strong></p>
                            <ol><li>We may limit or terminate our service, remove hosted content and take technical and legal steps to keep users off JoOpps.com if we think they are creating problems or acting inconsistently with the letter or spirit of our policies. Please report problems,
                                offensive content and policy violations by emailing us at enquiry@JoOpps.io</li></ol>
                        <p><strong>Liability</strong></p>
                            <ol><li>To the extent legally permitted we expressly disclaim all warranties, representations and conditions, express or implied, including those of quality, merchantability, merchantable quality, durability, fitness for a particular purpose and those arising by
                                statute. We are not liable for any loss, whether of money (including profit), goodwill, or reputation, or any special, indirect, or consequential damages arising out of your use of the Site even if you advise us or we could reasonably foresee the possibility of
                                any such damage occurring.</li></ol>
                        <p><strong>Indemnity</strong></p>
                            <ol><li>We may limit or terminate our service, remove hosted content and take technical and legal steps to keep users off JoOpps.com if we think they are creating problems or acting inconsistently with the letter or spirit of our policies. Please report problems,
                                offensive content and policy violations by emailing us at enquiry@JoOpps.io</li></ol>
                        <p><strong>Personal Information</strong></p>
                            <ol><li>By using the Site, you agree to the collection, transfer, storage and use of your personal information by JoOpps. Such personal information includes but are not limited to the following:</li> 
                                <ol type="a">
                                    <li>Your name</li>
                                    <li>Your age</li>
                                    <li>Your gender</li>
                                    <li>Your contact details, including email, telephone numbers and residential addresses</li>
                                    <li>Your “as is” compensation details as well as your expected details in future</li>
                                </ol>
                            </ol>
                        <p><strong>General</strong></p>
                            <ol>
                                <li>These terms and the other policies posted on the Site constitute the entire agreement between JoOpps and you, superseding any conflicting parts of any prior agreements. This Terms of Use is governed by the Laws of Malaysia. You agree that
                                    any claim or dispute you may have against JoOpps must be resolved by a court located in Malaysia. If we don&#39;t enforce any particular provision, we are not waiving our right to do so later. If a court strikes any of these terms, the remaining terms will
                                    survive. We may automatically assign this agreement in our sole discretion in accordance with the notice provision below. We will send notices to you via the email address that you provide, or by registered mail to the address you provide. Notices
                                    sent by registered mail will be deemed received 10 days following the date of mailing. We may update these terms at any time, with updates taking effect 30 days after they are initially posted on the Site.
                                </li>
                                <li>Refinements to these Terms of Use will be made as and when required. Feel free to check the Site for such refinements as and when they become available and are in effect.</li>
                            </ol>  
                            <form method="GET" action="{{ route('question.tnc') }}">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                    <button id="proceed-btn" class="btn btn-primary form-control text-center" type="submit">Proceed</button>
                                </div>
                            </form>
                    </div>
            </div>
        </div>
        

    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var proceed = document.getElementById('proceed-btn');
    proceed.addEventListener('click', function(event) {
        if (document.getElementById("invalidCheck").checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
          $('.invalid-feedback').show();
        }
      }, false);
  }, false);
</script>
@endsection

