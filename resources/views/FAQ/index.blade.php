<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Chatbot</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (with Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Custom CSS -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      padding: 20px;
    }

    .faq-container {
      max-width: 800px;
      margin: 0 auto;
    }

    .faq-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .faq-header h1 {
      font-size: 2.5rem;
      color: #4CAF50;
    }

    .faq-list {
      list-style-type: none;
      padding: 0;
    }

    .faq-list li {
      margin-bottom: 10px;
    }

    .faq-button {
      display: block;
      width: 100%;
      padding: 10px 20px;
      font-size: 1rem;
      font-weight: 500;
      color: #fff;
      background-color: #4CAF50;
      border: none;
      border-radius: 5px;
      text-align: left;
      transition: background-color 0.3s ease;
    }

    .faq-button:hover {
      background-color: #45a049;
    }

    .faq-button:focus {
      outline: none;
      box-shadow: 0 0 5px #4CAF50;
    }
  </style>
</head>
<body>
  <!-- FAQ Container -->
  <div class="faq-container">
    <div class="faq-header">
      <h1>FAQ Chatbot</h1>
      <p>Click on a question to get an instant answer!</p>
    </div>

    <h4>General Information</h4>
    <div class="accordion" id="faqAccordion">
    <!-- Question 1 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                Where is Teratai Anggun Homestay located?
            </button>
        </h2>
        <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                It is located in Sepintas, Sabak Bernam, Selangor.
            </div>
        </div>
    </div>

    <!-- Question 2 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                What types of accommodations are available?
            </button>
        </h2>
        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                We offer 2-bedroom and 3-bedroom homestays, as well as triangular chalets.
            </div>
        </div>
    </div>

    <!-- Question 3 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                What is the maximum capacity for group bookings?
            </button>
        </h2>
        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                The maximum capacity is 130 people across 15 units.
            </div>
        </div>
    </div>

    <!-- Question 4 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                Is the homestay suitable for family day events?
            </button>
        </h2>
        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Yes, it is ideal for family day events, offering complete facilities for large groups.
            </div>
        </div>
    </div>

    <!-- Question 5 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading5">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                Is the homestay Muslim-friendly?
            </button>
        </h2>
        <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Yes, the homestay is Muslim-friendly, with halal amenities and prayer facilities.
            </div>
        </div>
    </div>

    <!-- Question 6 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading6">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                Is Wi-Fi available?
            </button>
        </h2>
        <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Yes, Wi-Fi is available in selected areas around the homestay.
            </div>
        </div>
    </div>

    <!-- Question 7 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading7">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                Is there parking available?
            </button>
        </h2>
        <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Yes, parking is provided for all units.
            </div>
        </div>
    </div>
</div>

<br>
<h4>Booking and Payment</h4>
    <div class="accordion" id="faqAccordion">
    <!-- Question 8 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse1">
            How do I book a room at Teratai Anggun Homestay?
            </button>
        </h2>
        <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            You can book through the system. You need to create an account, log in, and book a room by selecting your desired unit (Homestay 2-Bilik, Homestay
3-Bilik, or Chalet) and providing your check-in and check-out dates. You can complete the payment via online transfer, QR Pay, or cash. Upload proof of payment to confirm your booking.
            </div>
        </div>
    </div>

    <!-- Question 9 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse2">
            Can I make a booking for the whole homestay for a family day?
            </button>
        </h2>
        <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, you can book all 15 units for a family day, accommodating 50-130 guests
            </div>
        </div>
    </div>

    <!-- Question 10 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse3">
            Do I need to pay a deposit?
            </button>
        </h2>
        <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, a deposit is required to confirm your booking.
            </div>
        </div>
    </div>

    <!-- Question 11 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse4">
            How much is the deposit?
                      </button>
        </h2>
        <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            The deposit is RM100 per unit per night or RM1,000 for full bookings
            </div>
        </div>
    </div>

    <!-- Question 12 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading5">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse5">
            What payment methods do you accept??
            </button>
        </h2>
        <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            We accept online transfers, QR Pay, and cash payments.
            </div>
        </div>
    </div>

    <!-- Question 13 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading6">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse6">
            Can I pay the balance on the check-in day?
            </button>
        </h2>
        <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            No, the full balance must be paid at least one day before check-in.
            </div>
        </div>
    </div>

    <!-- Question 14 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading7">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse7">
            What is the refund policy for cancellations?
            </button>
        </h2>
        <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Refunds are only given for cancellations made within seven days of booking. Beyond this, payments are forfeited.
            </div>
        </div>
    </div>
</div>

<br>
<h4>Room and Availability</h4>
    <div class="accordion" id="faqAccordion">
    <!-- Question 15 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse1">
            How do I check the availability of rooms?
            </button>
        </h2>
        <div id="collapse15" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            The system will show available units for your selected dates. You can also contact the receptionist via live chat for assistance.
            </div>
        </div>
    </div>

    <!-- Question 16 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse2">
            Can I choose a specific room or chalet?
            </button>
        </h2>
        <div id="collapse16" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Rooms are assigned based on availability; we do not allow specific unit selection.
            </div>
        </div>
    </div>

    <!-- Question 17 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse3">
            Can I book multiple units in one transaction?
            </button>
        </h2>
        <div id="collapse17" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, multiple units can be booked, subject to availability.            
          </div>
        </div>
    </div>

    <!-- Question 18 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse4">
            What is the check-in and check-out time?
                      </button>
        </h2>
        <div id="collapse18" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Check-in is at 3 PM, and check-out is by 12 PM.
                      </div>
        </div>
    </div>
</div>
<br>
<h4>Facilities</h4>
    <div class="accordion" id="faqAccordion">
    <!-- Question 19 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapse1">
            What facilities are available for guests?
            </button>
        </h2>
        <div id="collapse19" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Facilities include swimming pools, BBQ slots, a sports field, a surau, and
playgrounds. Each unit is equipped with air conditioning and basic kitchen appliances.
            </div>
        </div>
    </div>

    <!-- Question 20 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapse2">
            Are BBQ facilities provided?
                      </button>
        </h2>
        <div id="collapse20" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, BBQ sets are available for rent, starting at RM30.
                      </div>
        </div>
    </div>

    <!-- Question 21 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse21" aria-expanded="false" aria-controls="collapse3">
            21.	Are the swimming pools suitable for children?
                      </button>
        </h2>
        <div id="collapse21" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, we have separate pools for adults and children.
                      </div>
        </div>
    </div>

    <!-- Question 22 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapse4">
            Are there separate swimming pool hours for children and adults?
                      </button>
        </h2>
        <div id="collapse22" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Both pools are available for use during operating hours (3 PM - 9 PM for the first session, and 7 AM - 11:30 AM for the second session).
                      </div>
        </div>
    </div>

    <!-- Question 23 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading5">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse23" aria-expanded="false" aria-controls="collapse5">
            Are there kitchen facilities in the units?
                      </button>
        </h2>
        <div id="collapse23" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, all units come with basic kitchen appliances, such as a refrigerator, stove, and cooking utensils.            </div>
        </div>
    </div>

    <!-- Question 24 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading6">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse24" aria-expanded="false" aria-controls="collapse6">
            Are prayer facilities available?
                      </button>
        </h2>
        <div id="collapse24" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, we have a surau that can accommodate up to 30 people.
                      </div>
        </div>
    </div>
</div>
<br>
<h4>Rules and Regulations</h4>
    <div class="accordion" id="faqAccordion">
    <!-- Question 25 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse25" aria-expanded="false" aria-controls="collapse1">
            Are there rules for using the swimming pool?
            </button>
        </h2>
        <div id="collapse25" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, swimming pool hours are from 3 PM - 9 PM and 7 AM - 11:30 AM. Sukaneka activities are not allowed in the pool.
                      </div>
        </div>
    </div>

    <!-- Question 26 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse26" aria-expanded="false" aria-controls="collapse2">
            Can I bring my own BBQ equipment?
                      </button>
        </h2>
        <div id="collapse26" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, you can bring your own BBQ equipment, but prior approval is required.            </div>
        </div>
    </div>

    <!-- Question 27 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse27" aria-expanded="false" aria-controls="collapse3">
            Are there penalties for late check-out?
                      </button>
        </h2>
        <div id="collapse27" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, late check-outs may incur additional charges.
                      </div>
        </div>
    </div>

    <!-- Question 28 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse28" aria-expanded="false" aria-controls="collapse4">
            Are pets allowed at the homestay?
                      </button>
        </h2>
        <div id="collapse28" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            No, pets are not allowed.
                      </div>
        </div>
    </div>
</div>
<br>
<h4>Catering and Event Support</h4>
    <div class="accordion" id="faqAccordion">
    <!-- Question 29 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse29" aria-expanded="false" aria-controls="collapse1">
            Do you provide catering services?
                      </button>
        </h2>
        <div id="collapse29" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            We do not provide catering, but we can recommend local caterers.
                      </div>
        </div>
    </div>

    <!-- Question 30 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse30" aria-expanded="false" aria-controls="collapse2">
            Can I host a wedding or large gathering at the homestay?
                      </button>
        </h2>
        <div id="collapse30" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Yes, the homestay can host large gatherings. Please contact us for further arrangements.            </div>
        </div>
    </div>

    <!-- Question 31 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse31" aria-expanded="false" aria-controls="collapse3">
            Are tables and chairs provided for events?
                      </button>
        </h2>
        <div id="collapse31" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Tables and chairs can be rented. Rental charges apply.  
                    </div>
        </div>
    </div>
</div>
<br>
<h4>Support and Assistance</h4>
    <div class="accordion" id="faqAccordion">
    <!-- Question 32 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse32" aria-expanded="false" aria-controls="collapse1">
            How can I contact the receptionist?
                      </button>
        </h2>
        <div id="collapse32" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            You can reach us via LiveChat from 9 AM to 5 PM (except Sunday).            </div>
        </div>
    </div>

    <!-- Question 33 -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse33" aria-expanded="false" aria-controls="collapse2">
            Can the chatbot answer all questions?
                      </button>
        </h2>
        <div id="collapse33" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            The chatbot can handle most FAQs. If needed, you can use a live receptionist in the system.
                      </div>
        </div>
    </div>
</div>

  <!-- BotMan Widget Configuration
  <script>
    var botmanWidget = {
      aboutText: 'Write Something',
      introMessage: "✋ Hi! You may ask something!",
      mainColor: '#4CAF50',
      headerText: 'Teratai Anggun Homestay Assistant',
      chatServer: '/botman',
    };
  </script>

  <!-- Include Required Scripts
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js"></script>

  <script>
    function handleButtonClick(event) {
      var message = event.target.getAttribute('data-question');

      if (typeof botmanChatWidget !== 'undefined') {
        botmanChatWidget.open();

        setTimeout(function () {
          botmanChatWidget.say(message);
        }, 1000);
      } else {
        console.error('botmanChatWidget is not defined. Ensure the widget script is loaded.');
      }
    }

    var buttons = document.querySelectorAll('.faq-button');
    buttons.forEach(function (button) {
      button.addEventListener('click', handleButtonClick);
    });
</script> -->


<script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/01/22/08/20250122080624-IKCXH6BX.js"></script>
    

</body>
</html>
