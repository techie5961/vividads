@extends('layout.users.index')
@section('title')
   Provacy Policy
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
        
  
                <span>At <strong class="c-primary">{{ config('app.name') }}</strong>, we are dedicated to maintaining a transparent and secure marketplace for social micro-gigs. This policy outlines how we handle your data during task creation, performance, and verification.</span>

                <h2>1. Information for Advertisers</h2>
                <span>When you post a task as an advertiser, we collect information shared during your communication with our administration team:</span>
                <ul>
                    <li><strong>Chat Records:</strong> Details shared via admin chat to set up and fund your tasks.</li>
                    <li><strong>Campaign Links:</strong> Social media links, group invites, or profiles you wish to promote.</li>
                    <li><strong>Budget Data:</strong> Information regarding task pricing and total deposit amounts.</li>
                </ul>

                <h2>2. Information for Earners</h2>
                <span>To ensure fairness and prevent fraud, we collect specific data from earners performing tasks:</span>
                <ul>
                    <li><strong>Proof of Work:</strong> We collect and store <strong>screenshots</strong> submitted after task completion to verify you have followed the instructions.</li>
                    <li><strong>Verification Data:</strong> Your social media handles used to cross-reference the proof provided.</li>
                    
                </ul>

                <div class="highlight-box">
                    <strong>Note on Verification:</strong> Every task is subject to manual or system-assisted verification. Screenshots are stored securely and are only used to resolve disputes or confirm successful completion.
                </div>

                <h2>3. Task Workflow & Data Access</h2>
                <span>Our platform operates through a structured workflow to protect all parties:</span>
                <ul>
                    <li><strong>Admin Moderation:</strong> Admins review advertiser requests before posting them to the live dashboard.</li>
                    <li><strong>Earner Performance:</strong> Earners access task details and submit visual proof (screenshots) directly through their dashboard.</li>
                    <li><strong>Approval Process:</strong> Submitted proof is reviewed by the {{ config('app.name') }} team to ensure earners are paid fairly and advertisers receive genuine engagement.</li>
                </ul>

                <h2>4. Data Retention</h2>
                <span>We retain screenshots and chat logs for a period necessary to ensure all tasks are verified and payments are finalized. Once a task is successfully closed and the dispute window has passed, we may archive or delete visual proof to protect your storage and privacy.</span>

                <h2>5. Security of Proof</h2>
                <span>All screenshots and transaction data are transmitted over secure, encrypted channels. We do not share your private chat logs with third parties without your explicit consent.</span>

              
          
           
       

    </section>
@endsection