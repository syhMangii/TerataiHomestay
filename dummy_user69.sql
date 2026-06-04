-- ============================================================
-- Dummy data for user_id = 69 (pirem)
-- Last check-in: 2025-08-27 "smoke" is_continous=0
-- Fresh start from 2025-08-28 to quit date 2025-10-28 (61 days)
-- Streak bonuses at days 7,14,21,28,35,42,49,56
-- streak_count = 1,2,3,4,5,6,7,8
-- Badges: 5 (7 check-ins), 6 (14), 7 (21), streak badges 8(4th),9(5th),10(6th),11(7th),12(8th)
-- ============================================================

UPDATE users SET is_read = 1 WHERE id = 69;

-- DAY 1 — 2025-08-28
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-08-28 08:07:00', '2025-08-28 08:07:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-28 08:07:00', '2025-08-28 08:07:00');

-- DAY 2 — 2025-08-29
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-08-29 09:45:00', '2025-08-29 09:45:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-29 09:45:00', '2025-08-29 09:45:00');

-- DAY 3 — 2025-08-30
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-08-30 08:33:00', '2025-08-30 08:33:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-30 08:33:00', '2025-08-30 08:33:00');

-- DAY 4 — 2025-08-31
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-08-31 10:19:00', '2025-08-31 10:19:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-08-31 10:19:00', '2025-08-31 10:19:00');

-- DAY 5 — 2025-09-01
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-01 07:52:00', '2025-09-01 07:52:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-01 07:52:00', '2025-09-01 07:52:00');

-- DAY 6 — 2025-09-02
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-02 09:28:00', '2025-09-02 09:28:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-02 09:28:00', '2025-09-02 09:28:00');

-- DAY 7 — 2025-09-03 (STREAK BONUS streak_count=1, badge: 7 check-ins)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-03 08:41:00', '2025-09-03 08:41:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-03 08:41:00', '2025-09-03 08:41:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-03 08:41:01', '2025-09-03 08:41:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 1, '2025-09-03 08:41:01', '2025-09-03 08:41:01');

-- DAY 8 — 2025-09-04
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-04 07:38:00', '2025-09-04 07:38:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-04 07:38:00', '2025-09-04 07:38:00');

-- DAY 9 — 2025-09-05
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-05 09:11:00', '2025-09-05 09:11:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-05 09:11:00', '2025-09-05 09:11:00');

-- DAY 10 — 2025-09-06
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-06 08:54:00', '2025-09-06 08:54:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-06 08:54:00', '2025-09-06 08:54:00');

-- DAY 11 — 2025-09-07
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-07 10:02:00', '2025-09-07 10:02:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-07 10:02:00', '2025-09-07 10:02:00');

-- DAY 12 — 2025-09-08
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-08 08:17:00', '2025-09-08 08:17:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-08 08:17:00', '2025-09-08 08:17:00');

-- DAY 13 — 2025-09-09
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-09 09:36:00', '2025-09-09 09:36:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-09 09:36:00', '2025-09-09 09:36:00');

-- DAY 14 — 2025-09-10 (STREAK BONUS streak_count=2, badge: 14 check-ins)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-10 08:29:00', '2025-09-10 08:29:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-10 08:29:00', '2025-09-10 08:29:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-10 08:29:01', '2025-09-10 08:29:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 2, '2025-09-10 08:29:01', '2025-09-10 08:29:01');

-- DAY 15 — 2025-09-11
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-11 07:44:00', '2025-09-11 07:44:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-11 07:44:00', '2025-09-11 07:44:00');

-- DAY 16 — 2025-09-12
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-12 09:58:00', '2025-09-12 09:58:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-12 09:58:00', '2025-09-12 09:58:00');

-- DAY 17 — 2025-09-13
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-13 08:12:00', '2025-09-13 08:12:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-13 08:12:00', '2025-09-13 08:12:00');

-- DAY 18 — 2025-09-14
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-14 10:33:00', '2025-09-14 10:33:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-14 10:33:00', '2025-09-14 10:33:00');

-- DAY 19 — 2025-09-15
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-15 07:55:00', '2025-09-15 07:55:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-15 07:55:00', '2025-09-15 07:55:00');

-- DAY 20 — 2025-09-16
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-16 09:17:00', '2025-09-16 09:17:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-16 09:17:00', '2025-09-16 09:17:00');

-- DAY 21 — 2025-09-17 (STREAK BONUS streak_count=3, badge: 21 check-ins)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-17 08:48:00', '2025-09-17 08:48:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-17 08:48:00', '2025-09-17 08:48:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-17 08:48:01', '2025-09-17 08:48:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 3, '2025-09-17 08:48:01', '2025-09-17 08:48:01');

-- DAY 22 — 2025-09-18
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-18 07:31:00', '2025-09-18 07:31:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-18 07:31:00', '2025-09-18 07:31:00');

-- DAY 23 — 2025-09-19
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-19 09:04:00', '2025-09-19 09:04:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-19 09:04:00', '2025-09-19 09:04:00');

-- DAY 24 — 2025-09-20
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-20 08:22:00', '2025-09-20 08:22:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-20 08:22:00', '2025-09-20 08:22:00');

-- DAY 25 — 2025-09-21
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-21 10:44:00', '2025-09-21 10:44:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-21 10:44:00', '2025-09-21 10:44:00');

-- DAY 26 — 2025-09-22
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-22 08:03:00', '2025-09-22 08:03:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-22 08:03:00', '2025-09-22 08:03:00');

-- DAY 27 — 2025-09-23
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-23 09:39:00', '2025-09-23 09:39:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-23 09:39:00', '2025-09-23 09:39:00');

-- DAY 28 — 2025-09-24 (STREAK BONUS streak_count=4)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-24 07:57:00', '2025-09-24 07:57:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-24 07:57:00', '2025-09-24 07:57:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-24 07:57:01', '2025-09-24 07:57:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 4, '2025-09-24 07:57:01', '2025-09-24 07:57:01');

-- DAY 29 — 2025-09-25
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-25 08:45:00', '2025-09-25 08:45:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-25 08:45:00', '2025-09-25 08:45:00');

-- DAY 30 — 2025-09-26
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-26 09:22:00', '2025-09-26 09:22:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-26 09:22:00', '2025-09-26 09:22:00');

-- DAY 31 — 2025-09-27
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-27 08:14:00', '2025-09-27 08:14:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-27 08:14:00', '2025-09-27 08:14:00');

-- DAY 32 — 2025-09-28
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-28 10:08:00', '2025-09-28 10:08:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-28 10:08:00', '2025-09-28 10:08:00');

-- DAY 33 — 2025-09-29
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-29 07:51:00', '2025-09-29 07:51:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-29 07:51:00', '2025-09-29 07:51:00');

-- DAY 34 — 2025-09-30
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-09-30 09:03:00', '2025-09-30 09:03:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-09-30 09:03:00', '2025-09-30 09:03:00');

-- DAY 35 — 2025-10-01 (STREAK BONUS streak_count=5)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-01 08:37:00', '2025-10-01 08:37:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-01 08:37:00', '2025-10-01 08:37:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-01 08:37:01', '2025-10-01 08:37:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 5, '2025-10-01 08:37:01', '2025-10-01 08:37:01');

-- DAY 36 — 2025-10-02
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-02 07:43:00', '2025-10-02 07:43:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-02 07:43:00', '2025-10-02 07:43:00');

-- DAY 37 — 2025-10-03
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-03 09:28:00', '2025-10-03 09:28:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-03 09:28:00', '2025-10-03 09:28:00');

-- DAY 38 — 2025-10-04
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-04 08:11:00', '2025-10-04 08:11:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-04 08:11:00', '2025-10-04 08:11:00');

-- DAY 39 — 2025-10-05
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-05 10:22:00', '2025-10-05 10:22:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-05 10:22:00', '2025-10-05 10:22:00');

-- DAY 40 — 2025-10-06
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-06 08:55:00', '2025-10-06 08:55:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-06 08:55:00', '2025-10-06 08:55:00');

-- DAY 41 — 2025-10-07
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-07 07:39:00', '2025-10-07 07:39:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-07 07:39:00', '2025-10-07 07:39:00');

-- DAY 42 — 2025-10-08 (STREAK BONUS streak_count=6)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-08 09:14:00', '2025-10-08 09:14:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-08 09:14:00', '2025-10-08 09:14:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-08 09:14:01', '2025-10-08 09:14:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 6, '2025-10-08 09:14:01', '2025-10-08 09:14:01');

-- DAY 43 — 2025-10-09
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-09 08:27:00', '2025-10-09 08:27:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-09 08:27:00', '2025-10-09 08:27:00');

-- DAY 44 — 2025-10-10
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-10 10:01:00', '2025-10-10 10:01:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-10 10:01:00', '2025-10-10 10:01:00');

-- DAY 45 — 2025-10-11
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-11 08:44:00', '2025-10-11 08:44:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-11 08:44:00', '2025-10-11 08:44:00');

-- DAY 46 — 2025-10-12
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-12 07:32:00', '2025-10-12 07:32:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-12 07:32:00', '2025-10-12 07:32:00');

-- DAY 47 — 2025-10-13
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-13 09:53:00', '2025-10-13 09:53:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-13 09:53:00', '2025-10-13 09:53:00');

-- DAY 48 — 2025-10-14
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-14 08:06:00', '2025-10-14 08:06:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-14 08:06:00', '2025-10-14 08:06:00');

-- DAY 49 — 2025-10-15 (STREAK BONUS streak_count=7)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-15 09:41:00', '2025-10-15 09:41:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-15 09:41:00', '2025-10-15 09:41:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-15 09:41:01', '2025-10-15 09:41:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 7, '2025-10-15 09:41:01', '2025-10-15 09:41:01');

-- DAY 50 — 2025-10-16
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-16 08:19:00', '2025-10-16 08:19:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-16 08:19:00', '2025-10-16 08:19:00');

-- DAY 51 — 2025-10-17
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-17 10:35:00', '2025-10-17 10:35:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-17 10:35:00', '2025-10-17 10:35:00');

-- DAY 52 — 2025-10-18
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-18 07:48:00', '2025-10-18 07:48:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-18 07:48:00', '2025-10-18 07:48:00');

-- DAY 53 — 2025-10-19
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-19 09:07:00', '2025-10-19 09:07:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-19 09:07:00', '2025-10-19 09:07:00');

-- DAY 54 — 2025-10-20
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-20 08:33:00', '2025-10-20 08:33:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-20 08:33:00', '2025-10-20 08:33:00');

-- DAY 55 — 2025-10-21
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-21 10:14:00', '2025-10-21 10:14:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-21 10:14:00', '2025-10-21 10:14:00');

-- DAY 56 — 2025-10-22 (STREAK BONUS streak_count=8)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-22 08:52:00', '2025-10-22 08:52:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-22 08:52:00', '2025-10-22 08:52:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-22 08:52:01', '2025-10-22 08:52:01');
SET @sh = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh, 8, '2025-10-22 08:52:01', '2025-10-22 08:52:01');

-- DAY 57 — 2025-10-23
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-23 07:36:00', '2025-10-23 07:36:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-23 07:36:00', '2025-10-23 07:36:00');

-- DAY 58 — 2025-10-24
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-24 09:49:00', '2025-10-24 09:49:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-24 09:49:00', '2025-10-24 09:49:00');

-- DAY 59 — 2025-10-25
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-25 08:21:00', '2025-10-25 08:21:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-25 08:21:00', '2025-10-25 08:21:00');

-- DAY 60 — 2025-10-26
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-26 10:07:00', '2025-10-26 10:07:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-26 10:07:00', '2025-10-26 10:07:00');

-- DAY 61 (QUIT DATE) — 2025-10-28
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (69, 2, '2025-10-28 08:44:00', '2025-10-28 08:44:00');
SET @sh = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh, 'not smoke', 1, '2025-10-28 08:44:00', '2025-10-28 08:44:00');

-- BADGES
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 2, '2025-08-25 11:42:12', '2025-08-25 11:42:12', '2025-08-25 11:42:12') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 5, '2025-09-03 08:41:00', '2025-09-03 08:41:00', '2025-09-03 08:41:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 6, '2025-09-10 08:29:00', '2025-09-10 08:29:00', '2025-09-10 08:29:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 7, '2025-09-17 08:48:00', '2025-09-17 08:48:00', '2025-09-17 08:48:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 8, '2025-09-24 07:57:00', '2025-09-24 07:57:00', '2025-09-24 07:57:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 9, '2025-10-01 08:37:00', '2025-10-01 08:37:00', '2025-10-01 08:37:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 10, '2025-10-08 09:14:00', '2025-10-08 09:14:00', '2025-10-08 09:14:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 11, '2025-10-15 09:41:00', '2025-10-15 09:41:00', '2025-10-15 09:41:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 12, '2025-10-22 08:52:00', '2025-10-22 08:52:00', '2025-10-22 08:52:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (69, 4, '2025-10-28 08:44:00', '2025-10-28 08:44:00', '2025-10-28 08:44:00') ON DUPLICATE KEY UPDATE updated_at = updated_at;
