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
            <h2>Frequently Asked Questions</h2>
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
                            This project is a web application aimed at helping users manage tasks effectively and improve productivity.
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

            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-body p-5">
            <h2>Book Index?</h2>
            <div class="accordion mt-4" id="faqAccordion">

                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingIndex">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseIndex">
                            What is the Book Index?
                        </button>
                    </h2>
                    <div id="collapseIndex" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                        "The book index is a feature that provides detailed information about Badges, Avatars, and Shops (soon). 
                        It's like an in-game guide that helps players find what they’re looking for. You can access <a href="#" class="index">Index</a> here."
                        </div>
                    </div>
                </div>

@endsection