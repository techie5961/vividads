@extends('layout.users.index')
@section('title')
    Terms of Service
@endsection
@section('css')
    <style class="css">
        h2{
            padding:10px;
            background:var(--primary-dark);
            color:var(--primary-text);
            width:100%;
            display:flex;
            border-top:5px solid var(--primary)
        }
        .important-note{
            background:border:var(---primary);
            padding:20px;
            background:var(--primary-01);
            color:var(--primary-dark);
            border:1px dashed var(--primary)
        }
    </style>
@endsection
@section('main')
    <section class="w-full column marginalize g-10">
        

           
                <span>By accessing or using <strong class="c-primary">{{ config('app.name') }}</strong>, you agree to be bound by these Terms of Service. Please read them carefully.</span>

                <h2>1. Advertiser Guidelines</h2>
                <span>Advertisers do not post tasks directly to the dashboard. To ensure quality, the following process applies:</span>
                <ul class="rules-list">
                    <li><strong>Admin Consultation:</strong> Advertisers must contact a {{ config('app.name') }} administrator via the provided chat channels to request a task posting.</li>
                    <li><strong>Approval:</strong> {{ config('app.name') }} reserves the right to reject tasks that promote illegal content, hate speech, or malicious software.</li>
                    <li><strong>Payments:</strong> All task budgets must be pre-funded and confirmed by the admin before the task goes live for earners.</li>
                </ul>

                <h2>2. Earner Responsibilities</h2>
                <span>As an earner, you agree to perform tasks honestly and provide valid proof:</span>
                <ul class="rules-list">
                    <li><strong>Accuracy:</strong> You must complete the task exactly as described in the instructions.</li>
                    <li><strong>Proof Submission:</strong> You are required to upload a clear **screenshot** as evidence for every task completed.</li>
                    <li><strong>Honesty:</strong> Submitting fake screenshots, edited images, or old proof will result in an immediate and permanent ban from the platform.</li>
                </ul>

                <div class="important-note">
                    <strong>Zero Tolerance Policy:</strong> Any attempt to manipulate the system using bots, multiple accounts, or fraudulent proof will lead to the forfeiture of all earned funds.
                </div>

                <h2>3. Verification and Payments</h2>
                <span>{{ config('app.name') }} acts as a mediator to ensure fairness:</span>
                <ul>
                    <li><strong>Review Period:</strong> Our team reviews submitted screenshots to verify task completion. This process can take up to 24–48 hours.</li>
                    <li><strong>Payment Release:</strong> Funds are only released to the earner's wallet once the proof is approved by the admin.</li>
                    <li><strong>Disputes:</strong> If a task is rejected, earners may appeal by providing further evidence through support.</li>
                </ul>

                <h2>4. Account Security</h2>
                <span>You are responsible for maintaining the confidentiality of your account credentials. {{ config('app.name') }} is not liable for any loss resulting from unauthorized access to your account due to poor password security.</span>

                <h2>5. Modifications to Service</h2>
                <span>{{ config('app.name') }} reserves the right to modify, suspend, or discontinue any part of the service at any time. We also reserve the right to update these terms to reflect changes in our workflow.</span>

               
           
       

    </section>
@endsection