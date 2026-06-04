-- ============================================================
-- Dummy data for user_id = 71 (danushraj)
-- No existing records
-- Fresh start from 2025-08-26 to quit date 2025-09-26 (31 days)
-- Streak bonuses at days 7,14,21,28 → streak_count=1,2,3,4
-- Badges: 5 (7 check-ins), 6 (14), 7 (21), 8 (4th streak)
-- ============================================================

UPDATE users SET is_read = 1 WHERE id = 71;

-- Quit date
INSERT INTO quit_dates (user_id, quit_date, is_active, created_at, updated_at)
VALUES (71, '2025-09-26', 1, '2025-08-26 08:00:00', '2025-08-26 08:00:00');

-- DAY 1 — 2025-08-26
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-08-26 08:17:00', '2025-08-26 08:17:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-26 08:17:00', '2025-08-26 08:17:00');

-- DAY 2 — 2025-08-27
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-08-27 09:44:00', '2025-08-27 09:44:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-27 09:44:00', '2025-08-27 09:44:00');

-- DAY 3 — 2025-08-28
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-08-28 08:03:00', '2025-08-28 08:03:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-28 08:03:00', '2025-08-28 08:03:00');

-- DAY 4 — 2025-08-29
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-08-29 10:31:00', '2025-08-29 10:31:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-29 10:31:00', '2025-08-29 10:31:00');

-- DAY 5 — 2025-08-30
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-08-30 07:55:00', '2025-08-30 07:55:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-30 07:55:00', '2025-08-30 07:55:00');

-- DAY 6 — 2025-08-31
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-08-31 09:12:00', '2025-08-31 09:12:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-31 09:12:00', '2025-08-31 09:12:00');

-- DAY 7 — 2025-09-01 (STREAK BONUS streak_count=1, badge: 7 check-ins)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-01 08:38:00', '2025-09-01 08:38:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-01 08:38:00', '2025-09-01 08:38:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-01 08:38:01', '2025-09-01 08:38:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 1, '2025-09-01 08:38:01', '2025-09-01 08:38:01');

-- DAY 8 — 2025-09-02
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-02 07:49:00', '2025-09-02 07:49:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-02 07:49:00', '2025-09-02 07:49:00');

-- DAY 9 — 2025-09-03
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-03 09:27:00', '2025-09-03 09:27:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-03 09:27:00', '2025-09-03 09:27:00');

-- DAY 10 — 2025-09-04
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-04 08:14:00', '2025-09-04 08:14:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-04 08:14:00', '2025-09-04 08:14:00');

-- DAY 11 — 2025-09-05
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-05 10:03:00', '2025-09-05 10:03:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-05 10:03:00', '2025-09-05 10:03:00');

-- DAY 12 — 2025-09-06
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-06 08:51:00', '2025-09-06 08:51:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-06 08:51:00', '2025-09-06 08:51:00');

-- DAY 13 — 2025-09-07
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-07 07:37:00', '2025-09-07 07:37:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-07 07:37:00', '2025-09-07 07:37:00');

-- DAY 14 — 2025-09-08 (STREAK BONUS streak_count=2, badge: 14 check-ins)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-08 09:19:00', '2025-09-08 09:19:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-08 09:19:00', '2025-09-08 09:19:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-08 09:19:01', '2025-09-08 09:19:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 2, '2025-09-08 09:19:01', '2025-09-08 09:19:01');

-- DAY 15 — 2025-09-09
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-09 08:44:00', '2025-09-09 08:44:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-09 08:44:00', '2025-09-09 08:44:00');

-- DAY 16 — 2025-09-10
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-10 10:22:00', '2025-09-10 10:22:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-10 10:22:00', '2025-09-10 10:22:00');

-- DAY 17 — 2025-09-11
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-11 07:58:00', '2025-09-11 07:58:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-11 07:58:00', '2025-09-11 07:58:00');

-- DAY 18 — 2025-09-12
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-12 09:06:00', '2025-09-12 09:06:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-12 09:06:00', '2025-09-12 09:06:00');

-- DAY 19 — 2025-09-13
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-13 08:33:00', '2025-09-13 08:33:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-13 08:33:00', '2025-09-13 08:33:00');

-- DAY 20 — 2025-09-14
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-14 10:47:00', '2025-09-14 10:47:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-14 10:47:00', '2025-09-14 10:47:00');

-- DAY 21 — 2025-09-15 (STREAK BONUS streak_count=3, badge: 21 check-ins)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-15 08:11:00', '2025-09-15 08:11:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-15 08:11:00', '2025-09-15 08:11:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-15 08:11:01', '2025-09-15 08:11:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 3, '2025-09-15 08:11:01', '2025-09-15 08:11:01');

-- DAY 22 — 2025-09-16
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-16 09:29:00', '2025-09-16 09:29:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-16 09:29:00', '2025-09-16 09:29:00');

-- DAY 23 — 2025-09-17
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-17 07:43:00', '2025-09-17 07:43:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-17 07:43:00', '2025-09-17 07:43:00');

-- DAY 24 — 2025-09-18
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-18 10:05:00', '2025-09-18 10:05:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-18 10:05:00', '2025-09-18 10:05:00');

-- DAY 25 — 2025-09-19
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-19 08:57:00', '2025-09-19 08:57:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-19 08:57:00', '2025-09-19 08:57:00');

-- DAY 26 — 2025-09-20
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-20 07:34:00', '2025-09-20 07:34:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-20 07:34:00', '2025-09-20 07:34:00');

-- DAY 27 — 2025-09-21
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-21 09:48:00', '2025-09-21 09:48:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-21 09:48:00', '2025-09-21 09:48:00');

-- DAY 28 — 2025-09-22 (STREAK BONUS streak_count=4, badge: 4th streak)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-22 08:26:00', '2025-09-22 08:26:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-22 08:26:00', '2025-09-22 08:26:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-22 08:26:01', '2025-09-22 08:26:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 4, '2025-09-22 08:26:01', '2025-09-22 08:26:01');

-- DAY 29 — 2025-09-23
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-23 10:13:00', '2025-09-23 10:13:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-23 10:13:00', '2025-09-23 10:13:00');

-- DAY 30 — 2025-09-24
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-24 08:39:00', '2025-09-24 08:39:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-24 08:39:00', '2025-09-24 08:39:00');

-- DAY 31 — 2025-09-25
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-25 07:52:00', '2025-09-25 07:52:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-25 07:52:00', '2025-09-25 07:52:00');

-- DAY 32 (QUIT DATE) — 2025-09-26
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (71, 2, '2025-09-26 08:04:00', '2025-09-26 08:04:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-26 08:04:00', '2025-09-26 08:04:00');

-- BADGES
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (71, 1, '2025-08-25 11:59:48', '2025-08-25 11:59:48', '2025-08-25 11:59:48') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (71, 2, '2025-08-26 08:00:00', '2025-08-26 08:00:00', '2025-08-26 08:00:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (71, 5, '2025-09-01 08:38:00', '2025-09-01 08:38:00', '2025-09-01 08:38:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (71, 6, '2025-09-08 09:19:00', '2025-09-08 09:19:00', '2025-09-08 09:19:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (71, 7, '2025-09-15 08:11:00', '2025-09-15 08:11:00', '2025-09-15 08:11:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (71, 8, '2025-09-22 08:26:00', '2025-09-22 08:26:00', '2025-09-22 08:26:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (71, 4, '2025-09-26 08:04:00', '2025-09-26 08:04:00', '2025-09-26 08:04:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
