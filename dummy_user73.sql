-- ============================================================
-- Dummy data for user_id = 73
-- Continuous "not smoke" from 2025-08-28 to 2025-09-10 (14 days)
-- Picks up after the smoke reset on 2025-08-27
-- ============================================================

-- Quit date (set before the streak begins)
INSERT INTO quit_dates (user_id, quit_date, is_active, created_at, updated_at)
VALUES (73, '2025-09-10', 1, '2025-08-28 08:15:00', '2025-08-28 08:15:00');

-- ============================================================
-- DAY 1 — 2025-08-28  (continuous count: 1)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-08-28 07:42:00', '2025-08-28 07:42:00');

SET @sh1 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh1, 'not smoke', 1, '2025-08-28 07:42:00', '2025-08-28 07:42:00');

-- ============================================================
-- DAY 2 — 2025-08-29  (continuous count: 2)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-08-29 09:11:00', '2025-08-29 09:11:00');

SET @sh2 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh2, 'not smoke', 1, '2025-08-29 09:11:00', '2025-08-29 09:11:00');

-- ============================================================
-- DAY 3 — 2025-08-30  (continuous count: 3)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-08-30 08:03:00', '2025-08-30 08:03:00');

SET @sh3 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh3, 'not smoke', 1, '2025-08-30 08:03:00', '2025-08-30 08:03:00');

-- ============================================================
-- DAY 4 — 2025-08-31  (continuous count: 4)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-08-31 10:27:00', '2025-08-31 10:27:00');

SET @sh4 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh4, 'not smoke', 1, '2025-08-31 10:27:00', '2025-08-31 10:27:00');

-- ============================================================
-- DAY 5 — 2025-09-01  (continuous count: 5)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-01 07:55:00', '2025-09-01 07:55:00');

SET @sh5 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh5, 'not smoke', 1, '2025-09-01 07:55:00', '2025-09-01 07:55:00');

-- ============================================================
-- DAY 6 — 2025-09-02  (continuous count: 6)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-02 08:44:00', '2025-09-02 08:44:00');

SET @sh6 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh6, 'not smoke', 1, '2025-09-02 08:44:00', '2025-09-02 08:44:00');

-- ============================================================
-- DAY 7 — 2025-09-03  (continuous count: 7 → STREAK BONUS, streak_count = 1)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-03 09:18:00', '2025-09-03 09:18:00');

SET @sh7 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh7, 'not smoke', 1, '2025-09-03 09:18:00', '2025-09-03 09:18:00');

-- Streak bonus score + streak record
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-03 09:18:01', '2025-09-03 09:18:01');

SET @sh7b = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at)
VALUES (@sh7b, 1, '2025-09-03 09:18:01', '2025-09-03 09:18:01');

-- ============================================================
-- DAY 8 — 2025-09-04  (continuous count: 8)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-04 07:30:00', '2025-09-04 07:30:00');

SET @sh8 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh8, 'not smoke', 1, '2025-09-04 07:30:00', '2025-09-04 07:30:00');

-- ============================================================
-- DAY 9 — 2025-09-05  (continuous count: 9)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-05 08:52:00', '2025-09-05 08:52:00');

SET @sh9 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh9, 'not smoke', 1, '2025-09-05 08:52:00', '2025-09-05 08:52:00');

-- ============================================================
-- DAY 10 — 2025-09-06  (continuous count: 10)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-06 09:05:00', '2025-09-06 09:05:00');

SET @sh10 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh10, 'not smoke', 1, '2025-09-06 09:05:00', '2025-09-06 09:05:00');

-- ============================================================
-- DAY 11 — 2025-09-07  (continuous count: 11)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-07 07:48:00', '2025-09-07 07:48:00');

SET @sh11 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh11, 'not smoke', 1, '2025-09-07 07:48:00', '2025-09-07 07:48:00');

-- ============================================================
-- DAY 12 — 2025-09-08  (continuous count: 12)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-08 10:33:00', '2025-09-08 10:33:00');

SET @sh12 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh12, 'not smoke', 1, '2025-09-08 10:33:00', '2025-09-08 10:33:00');

-- ============================================================
-- DAY 13 — 2025-09-09  (continuous count: 13)
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-09 08:21:00', '2025-09-09 08:21:00');

SET @sh13 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh13, 'not smoke', 1, '2025-09-09 08:21:00', '2025-09-09 08:21:00');

-- ============================================================
-- DAY 14 — 2025-09-10  (continuous count: 14 → STREAK BONUS, streak_count = 2)
-- This is also the QUIT DATE — triggers active_on_quit_date badge
-- ============================================================
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-10 08:09:00', '2025-09-10 08:09:00');

SET @sh14 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at)
VALUES (@sh14, 'not smoke', 1, '2025-09-10 08:09:00', '2025-09-10 08:09:00');

-- Streak bonus score + streak record (streak_count = 2)
INSERT INTO score_histories (user_id, score, created_at, updated_at)
VALUES (73, 2, '2025-09-10 08:09:01', '2025-09-10 08:09:01');

SET @sh14b = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at)
VALUES (@sh14b, 2, '2025-09-10 08:09:01', '2025-09-10 08:09:01');

-- ============================================================
-- BADGES
-- Assumes badges table IDs follow seeder order:
--   1 = Welcome Aboard (login)        — likely already awarded, skip
--   2 = Quit Date Ready (quit_date_set)
--   3 = 6-Month Journey (login_duration 180d) — not yet
--   4 = You Made It! (active_on_quit_date)
--   5 = 7 Check-Ins (check_in req 7)
--   6 = 14 Check-Ins (check_in req 14)
--   7 = 21 Check-Ins (check_in req 21) — not yet
--   8..14 = streak badges (req 4–10)  — streak_count only reaches 2, not yet
-- ============================================================

-- Badge 2: Quit Date Ready (set when quit date is inserted, 2025-08-28)
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at)
VALUES (73, 2, '2025-08-28 08:15:00', '2025-08-28 08:15:00', '2025-08-28 08:15:00');

-- Badge 5: 7 Check-Ins (reached on day 7 = 2025-09-03)
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at)
VALUES (73, 5, '2025-09-03 09:18:00', '2025-09-03 09:18:00', '2025-09-03 09:18:00');

-- Badge 6: 14 Check-Ins (reached on day 14 = 2025-09-10)
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at)
VALUES (73, 6, '2025-09-10 08:09:00', '2025-09-10 08:09:00', '2025-09-10 08:09:00');

-- Badge 4: You Made It! — checked in "not smoke" on quit date 2025-09-10
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at)
VALUES (73, 4, '2025-09-10 08:09:00', '2025-09-10 08:09:00', '2025-09-10 08:09:00');
