<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Chatbot</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <!-- Button Options -->
    <ul class="faq-list">
      <li><button class="faq-button" data-question="where is teratai anggun homestay located">Where is Teratai Anggun Homestay located?</button></li>
      <li><button class="faq-button" data-question="what types of accommodations are available">What types of accommodations are available?</button></li>
      <li><button class="faq-button" data-question="what is the maximum capacity for group bookings">What is the maximum capacity for group bookings?</button></li>
      <li><button class="faq-button" data-question="is the homestay suitable for family day events">Is the homestay suitable for family day events?</button></li>
      <li><button class="faq-button" data-question="is the homestay muslim-friendly">Is the homestay Muslim-friendly?</button></li>
      <li><button class="faq-button" data-question="is wi-fi available">Is Wi-Fi available?</button></li>
      <li><button class="faq-button" data-question="is there parking available">Is there parking available?</button></li>
      <li><button class="faq-button" data-question="how do i book a room at teratai anggun homestay">How do I book a room at Teratai Anggun Homestay?</button></li>
      <li><button class="faq-button" data-question="can i make a booking for the whole homestay for a family day">Can I make a booking for the whole homestay for a family day?</button></li>
      <li><button class="faq-button" data-question="do i need to pay a deposit">Do I need to pay a deposit?</button></li>
      <li><button class="faq-button" data-question="how much is the deposit">How much is the deposit?</button></li>
      <li><button class="faq-button" data-question="what payment methods do you accept">What payment methods do you accept?</button></li>
      <li><button class="faq-button" data-question="can i pay the balance on the check-in day">Can I pay the balance on the check-in day?</button></li>
      <li><button class="faq-button" data-question="what is the refund policy for cancellations">What is the refund policy for cancellations?</button></li>
      <li><button class="faq-button" data-question="how do i check the availability of rooms">How do I check the availability of rooms?</button></li>
      <li><button class="faq-button" data-question="can i choose a specific room or chalet">Can I choose a specific room or chalet?</button></li>
      <li><button class="faq-button" data-question="can i book multiple units in one transaction">Can I book multiple units in one transaction?</button></li>
      <li><button class="faq-button" data-question="what is the check-in and check-out time">What is the check-in and check-out time?</button></li>
      <li><button class="faq-button" data-question="what facilities are available for guests">What facilities are available for guests?</button></li>
      <li><button class="faq-button" data-question="are bbq facilities provided">Are BBQ facilities provided?</button></li>
      <li><button class="faq-button" data-question="are the swimming pools suitable for children">Are the swimming pools suitable for children?</button></li>
      <li><button class="faq-button" data-question="are there separate swimming pool hours for children and adults">Are there separate swimming pool hours for children and adults?</button></li>
      <li><button class="faq-button" data-question="are there kitchen facilities in the units">Are there kitchen facilities in the units?</button></li>
      <li><button class="faq-button" data-question="are prayer facilities available">Are prayer facilities available?</button></li>
      <li><button class="faq-button" data-question="are there rules for using the swimming pool">Are there rules for using the swimming pool?</button></li>
      <li><button class="faq-button" data-question="can i bring my own bbq equipment">Can I bring my own BBQ equipment?</button></li>
      <li><button class="faq-button" data-question="are there penalties for late check-out">Are there penalties for late check-out?</button></li>
      <li><button class="faq-button" data-question="are pets allowed at the homestay">Are pets allowed at the homestay?</button></li>
      <li><button class="faq-button" data-question="do you provide catering services">Do you provide catering services?</button></li>
      <li><button class="faq-button" data-question="can i host a wedding or large gathering at the homestay">Can I host a wedding or large gathering at the homestay?</button></li>
      <li><button class="faq-button" data-question="are tables and chairs provided for events">Are tables and chairs provided for events?</button></li>
      <li><button class="faq-button" data-question="how can i contact the receptionist">How can I contact the receptionist?</button></li>
      <li><button class="faq-button" data-question="can the chatbot answer all questions">Can the chatbot answer all questions?</button></li>
    </ul>
  </div>

  <!-- BotMan Widget Configuration -->
  <script>
    var botmanWidget = {
      aboutText: 'Write Something',
      introMessage: "✋ Hi! You may ask something!",
      mainColor: '#4CAF50',
      headerText: 'Teratai Anggun Homestay Assistant',
      chatServer: '/botman',
    };
  </script>

  <!-- Include Required Scripts -->
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
</script>

</body>
</html>
