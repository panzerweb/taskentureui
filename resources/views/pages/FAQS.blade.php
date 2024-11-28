{{-- 
 ==========================================================
 ||                   FAQS Page                    ||
 ==========================================================
 
 Description: 
 This is the FAQS page for all the queries. Here you can 
 find the question in a list of questions 
 and answers intended to help people understand a particular subject: 
 If you have any problems, consult the FAQs on our website.

 
--}}

@extends('layouts.app')
@section('content')
<div class="help-header-div py-5">
    <h1 class="text-center text-light">
        FAQS
    </h1>
</div>


<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-body p-5">
            <h2 style="color: #6635B1">Frequently Asked Questions</h2>
            <div class="accordion mt-4" id="faqAccordion">

                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            What is this project about?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                        This project is a gamified web-based to-do list application designed to make task management engaging and fun. 
                        By incorporating game-like elements such as rewards, levels, and achievements, the system motivates users to complete tasks and stay productive. 
                        It aims to transform everyday task organization into an enjoyable and rewarding experience.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            How do I use the task management feature?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            To use the task management feature, create an account, log in, and navigate to the "Tasks" section to add, edit, or delete your tasks.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            Can I access this application on mobile devices?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, the application is fully responsive and optimized for use on both desktop and mobile devices.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                        Does Reporting a Bug fetches some of our sensitive data?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                        No, reporting a bug does not collect or send any sensitive personal data. 
                        Only information relevant to identifying and fixing the issue is gathered, 
                        and you have full control over the details you share.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                        What does Priority means in Task Management Section?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                            The Task Management section allows users to set the priority of their tasks to help them focus on what matters most. 
                            <br>There are three priority levels available:  <br>
                            - **High Priority**: Tasks that require immediate attention or are critical to completing your goals.  <br>
                            - **Medium Priority**: Important tasks that can be scheduled for later or after high-priority items are addressed.  <br>
                            - **Low Priority**: Tasks that are less urgent and can be completed at a more flexible time.  <br>
                            Assigning a priority ensures efficient time management and better organization of your to-do list.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection