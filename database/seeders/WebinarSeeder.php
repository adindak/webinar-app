<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Clear existing data (optional)
        $this->command->info('🗑️ Clearing existing data...');
        DB::table('participant')->delete();
        DB::table('master_webinar')->delete();
        
        // First, create users if they don't exist
        $this->createUsers($faker);
        
        // Get all user IDs for participant assignment
        $userIds = DB::table('users')->pluck('id')->toArray();
        
        // Define webinar topics and categories
        $webinarTopics = [
            'Digital Marketing' => [
                'Digital Marketing Strategy untuk UMKM',
                'Social Media Marketing: Instagram & TikTok',
                'Google Ads & Facebook Ads Mastery',
                'Content Marketing yang Efektif',
                'Email Marketing Automation',
                'SEO & SEM untuk Bisnis Online',
                'Influencer Marketing Strategy',
                'Digital Branding & Online Presence',
                'E-commerce Marketing Strategy',
                'Marketing Analytics & Data-Driven Decisions'
            ],
            'Technology' => [
                'Web Development dengan Laravel',
                'Mobile App Development Flutter',
                'AI & Machine Learning untuk Pemula',
                'Cloud Computing dengan AWS',
                'Cybersecurity Fundamentals',
                'Database Design & Optimization',
                'DevOps Implementation',
                'Blockchain Technology',
                'UI/UX Design Principles',
                'API Development & Integration'
            ],
            'Business' => [
                'Startup Funding & Investment',
                'Business Plan Development',
                'Financial Management untuk Startup',
                'Leadership & Team Management',
                'Strategic Planning & Execution',
                'Customer Service Excellence',
                'Sales Techniques & Negotiation',
                'Project Management Best Practices',
                'Business Process Automation',
                'Market Research & Analysis'
            ],
            'Personal Development' => [
                'Time Management & Productivity',
                'Public Speaking & Presentation Skills',
                'Career Development Planning',
                'Stress Management & Work-Life Balance',
                'Communication Skills Enhancement',
                'Critical Thinking & Problem Solving',
                'Emotional Intelligence at Work',
                'Networking & Relationship Building',
                'Goal Setting & Achievement',
                'Personal Branding for Professionals'
            ]
        ];

        $locations = [
            'Zoom Meeting',
            'Google Meet',
            'Microsoft Teams',
            'Webex',
            'Hotel Shangri-La Jakarta',
            'Balai Kartini Jakarta',
            'JCC (Jakarta Convention Center)',
            'Gedung Smesco Jakarta',
            'Hotel Grand Hyatt Jakarta',
            'Universitas Indonesia - Depok'
        ];

        $descriptions = [
            'Webinar ini akan membahas strategi dan teknik terbaru yang dapat membantu Anda meningkatkan performa bisnis dan mencapai target yang diinginkan.',
            'Pelajari tips dan trik dari para ahli industri untuk mengoptimalkan potensi Anda dan mengembangkan skill yang dibutuhkan di era digital.',
            'Dapatkan insight mendalam tentang tren terkini dan best practices yang telah terbukti berhasil diterapkan oleh berbagai perusahaan.',
            'Workshop interaktif yang akan memberikan Anda pemahaman praktis dan actionable insights untuk langsung diterapkan.',
            'Sesi pembelajaran intensif yang dirancang khusus untuk membantu Anda menguasai konsep fundamental hingga advanced.',
            'Bergabunglah dengan komunitas profesional dan pelajari strategi yang telah terbukti efektif meningkatkan produktivitas.',
            'Temukan metodologi terbaru dan tools yang dapat membantu Anda mencapai hasil yang maksimal dalam waktu yang efisien.',
            'Webinar eksklusif yang menghadirkan pembicara berpengalaman dan case study nyata dari industri.',
            'Pelajari framework dan sistem yang dapat Anda implementasikan untuk meningkatkan efektivitas kerja.',
            'Sesi pembelajaran komprehensif yang mencakup teori, praktik, dan studi kasus untuk pemahaman yang mendalam.'
        ];

        $webinars = [];
        $webinarCount = 0;

        // Generate 3 webinars per month for 12 months (36 total)
        for ($month = 1; $month <= 12; $month++) {
            for ($webinarInMonth = 1; $webinarInMonth <= 3; $webinarInMonth++) {
                $webinarCount++;
                
                // Random category and topic
                $categories = array_keys($webinarTopics);
                $selectedCategory = $faker->randomElement($categories);
                $selectedTopic = $faker->randomElement($webinarTopics[$selectedCategory]);
                
                // Random date in the month (2024)
                $startDate = Carbon::create(2024, $month, $faker->numberBetween(1, 28));
                
                // Random time between 9 AM to 6 PM
                $hours = $faker->randomElement(['09', '10', '11', '13', '14', '15', '16', '17', '18']);
                $minutes = $faker->randomElement(['00', '15', '30', '45']);
                $startTime = $hours . ':' . $minutes . ':00';
                
                // Random price (0 - 8,000,000)
                $price = $faker->numberBetween(0, 8000000);
                // Round to nearest 50,000 for realistic pricing
                if ($price > 0) {
                    $price = round($price / 50000) * 50000;
                }
                
                // Random access type
                $access = $faker->randomElement(['public', 'private']);
                
                // Random published status (80% published, 20% draft)
                $published = $faker->boolean(80) ? 1 : 0;
                
                // Random participants (50-500)
                $totalParticipants = $faker->numberBetween(50, 500);
                
                // Random location
                $location = $faker->randomElement($locations);
                
                // Random description
                $description = $faker->randomElement($descriptions);
                
                // Generate random meeting links
                $meetingLinks = [
                    'https://zoom.us/j/' . $faker->numerify('###########') . '?pwd=' . $faker->bothify('??##??##??##'),
                    'https://meet.google.com/' . $faker->bothify('???-????-???'),
                    'https://teams.microsoft.com/l/meetup-join/' . $faker->bothify('##??##??##??##??##??'),
                    'https://zoom.us/j/' . $faker->numerify('############'),
                    'https://meet.google.com/' . $faker->bothify('????-????-????'),
                ];
                
                $link = $faker->randomElement($meetingLinks);
                
                // Random image filename
                $imageFiles = [
                    'webinar-1.jpg',
                    'webinar-2.jpg', 
                    'webinar-3.jpg',
                    'webinar-4.jpg',
                    'webinar-5.jpg',
                    'event-1.jpg',
                    'event-2.jpg',
                    'event-3.jpg',
                    null
                ];
                $image = $faker->randomElement($imageFiles);
                
                $webinars[] = [
                    'id' => $webinarCount,
                    'name' => $selectedTopic,
                    'description' => $description,
                    'start_date' => $startDate->format('Y-m-d'),
                    'start_time' => $startTime,
                    'place_location' => $location,
                    'price' => $price,
                    'published' => $published,
                    'access' => $access,
                    'total_participants' => $totalParticipants,
                    'image' => NULL,
                    'link' => $link,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert webinars
        $webinarChunks = array_chunk($webinars, 10);
        foreach ($webinarChunks as $chunk) {
            DB::table('master_webinar')->insert($chunk);
        }

        $this->command->info('✅ Successfully created ' . count($webinars) . ' webinars');
        
        // Create participants
        $this->createParticipants($webinars, $userIds, $faker);
        
        // Display summary
        $this->displaySummary();
    
    }

    /**
     * Create users if they don't exist
     */
    private function createUsers($faker)
    {
        $existingUsers = DB::table('users')->count();
        
        if ($existingUsers < 200) {
            $this->command->info('👥 Creating users...');
            
            $users = [];
            $usersToCreate = 200;
            // dd($usersToCreate);
            for ($i = 0; $i < $usersToCreate; $i++) {
                $firstName = $faker->firstName();
                $lastName = $faker->lastName();
                $fullName = $firstName . ' ' . $lastName;
                $email = strtolower($firstName . '.' . $lastName . $faker->numberBetween(1, 999) . '@' . $faker->randomElement(['gmail.com', 'yahoo.com', 'outlook.com', 'company.com']));
                
                $users[] = [
                    'fullname' => $fullName,
                    'email' => $email,
                    'password' => bcrypt('password123'), // Default password
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            
            // Insert users in batches
            $chunks = array_chunk($users, 20);
            foreach ($chunks as $chunk) {
                DB::table('users')->insert($chunk);
            }
            
            $this->command->info("✅ Created {$usersToCreate} new users");
        } else {
            $this->command->info("👥 Using existing {$existingUsers} users");
        }
    }

    /**
     * Create participants for webinars
     */
    private function createParticipants($webinars, $userIds, $faker)
    {
        $this->command->info('🎯 Creating webinar participants...');
        
        $participants = [];
        $totalParticipants = 0;
        
        foreach ($webinars as $webinar) {
            // Determine how many participants for this webinar (50-80% of total_participants)
            $participantCount = $faker->numberBetween(
                (int)($webinar['total_participants'] * 0.3), 
                (int)($webinar['total_participants'] * 0.6)
            );
            
            // Randomly select users for this webinar
            $selectedUsers = $faker->randomElements($userIds, $participantCount);
            
            // Create participant records
            foreach ($selectedUsers as $userId) {
                $status = $faker->randomElement(['registered', 'attended', 'cancelled', 'no_show']);
                
                // is_participant: 1 if attended, 0 if not
                $isParticipant = ($status === 'attended') ? 1 : 0;
                
                // link_certificate: only for attended participants
                $linkCertificate = null;
                if ($status === 'attended') {
                    $linkCertificate = 'certificates/cert_' . $webinar['id'] . '_' . $userId . '_' . time() . '.pdf';
                }
                
                $participants[] = [
                    'webinar_id' => $webinar['id'],
                    'user_id' => $userId,
                    'status' => $status,
                    'is_participant' => $isParticipant,
                    'link_certificate' => $linkCertificate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                
                $totalParticipants++;
            }
        }
        
        // Insert participants in batches
        $chunks = array_chunk($participants, 50);
        foreach ($chunks as $chunk) {
            DB::table('participant')->insert($chunk);
        }
        
        $this->command->info("✅ Created {$totalParticipants} participant records");
    

        // // Insert webinars in batches
        // $chunks = array_chunk($webinars, 10);
        // foreach ($chunks as $chunk) {
        //     DB::table('master_webinar')->insert($chunk);
        // }

        // $this->command->info('✅ Successfully created ' . count($webinars) . ' webinars (3 per month for 12 months)');
        
        // Display summary
        $this->displaySummary();
    }

    private function displaySummary()
    {
        $this->command->info('📊 WEBINAR SEEDER SUMMARY:');
        $this->command->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        
        // Count by month
        for ($month = 1; $month <= 12; $month++) {
            $monthName = Carbon::create(2024, $month, 1)->format('F Y');
            $count = DB::table('master_webinar')
                ->whereYear('start_date', 2024)
                ->whereMonth('start_date', $month)
                ->count();
            
            $this->command->line("📅 {$monthName}: {$count} webinars");
        }
        
        $this->command->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        
        // Count by price type
        $freeCount = DB::table('master_webinar')->where('price', 0)->count();
        $paidCount = DB::table('master_webinar')->where('price', '>', 0)->count();
        
        $this->command->info("💰 Free Webinars: {$freeCount}");
        $this->command->info("💎 Paid Webinars: {$paidCount}");
        
        // Count by access type
        $publicCount = DB::table('master_webinar')->where('access', 'public')->count();
        $privateCount = DB::table('master_webinar')->where('access', 'private')->count();
        
        $this->command->info("🌐 Public Webinars: {$publicCount}");
        $this->command->info("🔒 Private Webinars: {$privateCount}");
        
        // Count by published status
        $publishedCount = DB::table('master_webinar')->where('published', 1)->count();
        $unpublishedCount = DB::table('master_webinar')->where('published', 0)->count();
        
        $this->command->info("📢 Published Webinars: {$publishedCount}");
        $this->command->info("📝 Draft Webinars: {$unpublishedCount}");
        
        // Participant statistics
        $totalParticipants = DB::table('participant')->count();
        $attendedCount = DB::table('participant')->where('status', 'attended')->count();
        $registeredCount = DB::table('participant')->where('status', 'registered')->count();
        $cancelledCount = DB::table('participant')->where('status', 'cancelled')->count();
        $noShowCount = DB::table('participant')->where('status', 'no_show')->count();
        $certificateCount = DB::table('participant')->whereNotNull('link_certificate')->count();
        
        $this->command->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->info("👥 PARTICIPANT STATISTICS:");
        $this->command->info("📊 Total Participants: {$totalParticipants}");
        $this->command->info("✅ Attended: {$attendedCount}");
        $this->command->info("📝 Registered: {$registeredCount}");
        $this->command->info("❌ Cancelled: {$cancelledCount}");
        $this->command->info("👻 No Show: {$noShowCount}");
        $this->command->info("🏆 Certificates Issued: {$certificateCount}");
        
        // User statistics
        $totalUsers = DB::table('users')->count();
        $this->command->info("👤 Total Users: {$totalUsers}");
        
        $this->command->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->info('🎉 Complete seeding finished successfully!');
    }
    
}