<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
    
        $botman->hears('hi', function ($botman) {
            $this->askName($botman);
        });

        $faq = [
            'where is teratai anggun homestay located' => 'It is located in Sepintas, Sabak Bernam, Selangor.',
            'what types of accommodations are available' => 'We offer 2-bedroom and 3-bedroom homestays, as well as triangular chalets.',
            'what is the maximum capacity for group bookings' => 'The maximum capacity is 130 people across 15 units.',
            'is the homestay suitable for family day events' => 'Yes, it is ideal for family day events, offering complete facilities for large groups.',
            'is the homestay muslim-friendly' => 'Yes, the homestay is Muslim-friendly, with halal amenities and prayer facilities.',
            'is wi-fi available' => 'Yes, Wi-Fi is available in selected areas around the homestay.',
            'is there parking available' => 'Yes, parking is provided for all units.',
            'how do i book a room at teratai anggun homestay' => 'You can book through the system. Create an account, log in, and book a room by selecting your desired unit and providing your check-in and check-out dates. Payment can be completed via online transfer, QR Pay, or cash.',
            'can i make a booking for the whole homestay for a family day' => 'Yes, you can book all 15 units for a family day, accommodating 50-130 guests.',
            'do i need to pay a deposit' => 'Yes, a deposit is required to confirm your booking.',
            'how much is the deposit' => 'The deposit is RM100 per unit per night or RM1,000 for full bookings.',
            'what payment methods do you accept' => 'We accept online transfers, QR Pay, and cash payments.',
            'can i pay the balance on the check-in day' => 'No, the full balance must be paid at least one day before check-in.',
            'what is the refund policy for cancellations' => 'Refunds are only given for cancellations made within seven days of booking. Beyond this, payments are forfeited.',
            'how do i check the availability of rooms' => 'The system will show available units for your selected dates. You can also contact the receptionist via live chat for assistance.',
            'can i choose a specific room or chalet' => 'Rooms are assigned based on availability; we do not allow specific unit selection.',
            'can i book multiple units in one transaction' => 'Yes, multiple units can be booked, subject to availability.',
            'what is the check-in and check-out time' => 'Check-in is at 3 PM, and check-out is by 12 PM.',
            'what facilities are available for guests' => 'Facilities include swimming pools, BBQ slots, a sports field, a surau, and playgrounds. Each unit is equipped with air conditioning and basic kitchen appliances.',
            'are bbq facilities provided' => 'Yes, BBQ sets are available for rent, starting at RM30.',
            'are the swimming pools suitable for children' => 'Yes, we have separate pools for adults and children.',
            'are there separate swimming pool hours for children and adults' => 'Both pools are available for use during operating hours (3 PM - 9 PM for the first session, and 7 AM - 11:30 AM for the second session).',
            'are there kitchen facilities in the units' => 'Yes, all units come with basic kitchen appliances, such as a refrigerator, stove, and cooking utensils.',
            'are prayer facilities available' => 'Yes, we have a surau that can accommodate up to 30 people.',
            'are there rules for using the swimming pool' => 'Yes, swimming pool hours are from 3 PM - 9 PM and 7 AM - 11:30 AM. Sukaneka activities are not allowed in the pool.',
            'can i bring my own bbq equipment' => 'Yes, you can bring your own BBQ equipment, but prior approval is required.',
            'are there penalties for late check-out' => 'Yes, late check-outs may incur additional charges.',
            'are pets allowed at the homestay' => 'No, pets are not allowed.',
            'do you provide catering services' => 'We do not provide catering, but we can recommend local caterers.',
            'can i host a wedding or large gathering at the homestay' => 'Yes, the homestay can host large gatherings. Please contact us for further arrangements.',
            'are tables and chairs provided for events' => 'Tables and chairs can be rented. Rental charges apply.',
            'how can i contact the receptionist' => 'You can reach us via LiveChat from 9 AM to 5 PM (except Sunday).',
            'can the chatbot answer all questions' => 'The chatbot can handle most FAQs. If needed, you can use a live receptionist in the system.'
        ];

        /*
        $botman->hears('[a-zA-Z0-9\s]+', function ($botman) {
            $botman->reply("Write 'hi' for testing...");
        });
        */

        foreach ($faq as $question => $answer) {
            $botman->hears($question, function ($botman) use ($answer) {
                $botman->reply($answer);
            });
        }

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Hello! What is your name?', function (Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to meet you ' . $name);
        });
    }
}