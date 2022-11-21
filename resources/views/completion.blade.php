@yield('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="p-5 bg-white rounded shadow mb-5">
                <p><strong>Thank you, Next Steps note for post JoOpps Attributes Profiling Exercise</strong></p>
                <p>JoOpps thanks you for using this Attributes Profiling Exercise.</p>
                <p><strong>Some background of the Profiling Exercise that you have just undertaken</p></strong>
                <p>Now that you have completed the Exercise you will be provided with a score against the what we view are the Top 10 Attributes required for a particular role or job. 
                    Please note that over the course of the Exercise that you have just undertaken, you have assessed yourself against 5 Key Dimensions, namely</p>
                <p>
                    <ol>
                        <li>Managing Self</li>
                        <li>Outcomes Focused</li>
                        <li>Problem Solving</li>
                        <li>Working with Others</li>
                        <li>Self Develoment</li>
                    </ol>
                </p>
                <p>And within these 5 Dimensions, there are the 18 JoOpps Attributes which we have identified that will be playing out for each role and these are as follows:</p>
                <p>
                    <ol>
                        <li>Authentic Leadership – where one leads with purpose and conviction and demonstrates excellence through self discipline.</li>
                        <li>Having Strong Judgement - able to form an opinion / make a decision objectively and authoritatively, after taking all factors into consideration.</li>
                        <li>Being Agile &amp; Adaptable - able to be flexible, open and willing to respond positively to the situation at hand.</li>
                        <li>Working Under Pressure - able to deal with limitations and constraints which are often out of one&#39;s control.</li>
                        <li>Emotionally Connected as a Leader - having the capability to recognise, understand and manage one&#39;s own emotions.</li>
                        <li>Being Ethical - able to recognise one&#39;s own feelings when one encounters what is morally right or wrong in a particular situation.</li>
                        <li>Results Oriented - having the ability to recognise what goals are important and why and what needs to be done to achieve these goals.</li>
                        <li>Being Purposefully Driven - being creative, having determination and integrity.</li>
                        <li>Having an Entrepreneurial Spirit - able to take purposeful and planful risks to get the results required.</li>
                        <li>Being an Active Listener - able to receive and interpret other non verbal cues, such as body language in ways that are appropriate to the purpose at hand.</li>
                        <li>Being a Creative Thinker - consistently looking for new opportunities and solutions for problems and challenges beyond current practices and the use of innovative thinking.</li>
                        <li>Being a Problem Solver - able to clearly define a problem, determine the cause of the problem, identify a range of possible solutions, prioritise and select alternatives for a solution and finally implement on the same.</li>
                        <li>Being a Data Interpreter - able to review data through some predefined processes which help assign meaning to the data and so arrive at a relevant conclusions.</li>
                        <li>Being Digitally Literate - able to easily participate and function in a fully digital environment.</li>
                        <li>Being a Team Player - work openly and actively as well as collaborate with others to drive shared goals.</li>
                        <li>Being Human Centric - being empathetic, able to actively listen and communicate well, having emotional intelligence, being creative and collaborative and socially connected.</li>
                        <li>Being an Impactful Communicator - being an active listener and then articulating thoughts in a clear, coherent and precise fashion.</li>
                        <li>Life Long Learner - able to control own learning process with a level of self control and accountability and consistently driving towards self set standards of excellence.</li>
                    </ol>
                </p>
                <p><strong>What's Next</p></strong>
                <p>
                    <ul>
                        <li>Out of the 18 JoOpps Attributes, 10 have been specifically selected for the role that you have selected to be profiled against.</li>
                        <li>What you will view in your Profile Chart is your personal profile as against the expected profile of the role you have selected.</li>
                    </ul>
                </p>
                <p><strong>Conclusions</strong></p>
                <p>This Score that you have received is out of 100%. It is derived from an aggregated score from the following components:
                    <ol type="a">
                        <li>The Profiling Exercise that you have just completed</li>
                        <li>The years of Work Experience that you have</li>
                        <li>Your Educational Background</li>
                        <li>The Professional accreditations that you possess</li>
                    </ol>
                </p>
                <p>
                    <ul>
                        <li>An internal JoOpps derived analysis is applied to compute a score.</li>
                        <li>This Score is viewed as your “suitability” against the role you have identified.    </li>
                        <li>Please note that that your suitability score will vary depending on your attributes profiling score, your work experience, educational background, your professional accreditations 
                            and of course the role that you have specifically targeted to be profiled against.</li>
                        <li>Change any one of these variables, and you will observe your suitability score change as well.</li>
                    </ul>
                </p>
                <p>We wish you all the best in your endeavours and look forward to having you profile yourself with us once again, this time against a new role.</p>
                <div><button id="result-btn" class="btn btn-primary form-control text-center" type="submit">View Result</button></div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#result-btn').click(function() {
            var url = "{{ route('answer.score') }}";
            $.ajax({
                type:'GET',
                url:url,
                success:function(data, success, error) {
                    $("#card-box").html(data);
                }
            });
        });
    });
</script>