-- ============================================================
-- Dummy data for user_id = 68 (rittesh)
-- Last check-in: 2025-08-27 "smoke" is_continous=0
-- Fresh start from 2025-08-28 to quit date 2025-09-08 (11 days)
-- Streak bonus at day 7 (2025-09-03), streak_count=1
-- ============================================================

UPDATE users SET is_read = 1 WHERE id = 68;

-- DAY 1 — 2025-08-28
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-08-28 07:51:00', '2025-08-28 07:51:00');
SET @sh1 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh1, 'not smoke', 1, '2025-08-28 07:51:00', '2025-08-28 07:51:00');

-- DAY 2 — 2025-08-29
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-08-29 08:22:00', '2025-08-29 08:22:00');
SET @sh2 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh2, 'not smoke', 1, '2025-08-29 08:22:00', '2025-08-29 08:22:00');

-- DAY 3 — 2025-08-30
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-08-30 09:14:00', '2025-08-30 09:14:00');
SET @sh3 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh3, 'not smoke', 1, '2025-08-30 09:14:00', '2025-08-30 09:14:00');

-- DAY 4 — 2025-08-31
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-08-31 07:40:00', '2025-08-31 07:40:00');
SET @sh4 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh4, 'not smoke', 1, '2025-08-31 07:40:00', '2025-08-31 07:40:00');

-- DAY 5 — 2025-09-01
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-01 10:03:00', '2025-09-01 10:03:00');
SET @sh5 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh5, 'not smoke', 1, '2025-09-01 10:03:00', '2025-09-01 10:03:00');

-- DAY 6 — 2025-09-02
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-02 08:55:00', '2025-09-02 08:55:00');
SET @sh6 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh6, 'not smoke', 1, '2025-09-02 08:55:00', '2025-09-02 08:55:00');

-- DAY 7 — 2025-09-03 (STREAK BONUS, streak_count=1)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-03 09:07:00', '2025-09-03 09:07:00');
SET @sh7 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh7, 'not smoke', 1, '2025-09-03 09:07:00', '2025-09-03 09:07:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-03 09:07:01', '2025-09-03 09:07:01');
SET @sh7b = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh7b, 1, '2025-09-03 09:07:01', '2025-09-03 09:07:01');

-- DAY 8 — 2025-09-04
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-04 08:18:00', '2025-09-04 08:18:00');
SET @sh8 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh8, 'not smoke', 1, '2025-09-04 08:18:00', '2025-09-04 08:18:00');

-- DAY 9 — 2025-09-05
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-05 07:49:00', '2025-09-05 07:49:00');
SET @sh9 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh9, 'not smoke', 1, '2025-09-05 07:49:00', '2025-09-05 07:49:00');

-- DAY 10 — 2025-09-06
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-06 09:31:00', '2025-09-06 09:31:00');
SET @sh10 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh10, 'not smoke', 1, '2025-09-06 09:31:00', '2025-09-06 09:31:00');

-- DAY 11 — 2025-09-07
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-07 08:43:00', '2025-09-07 08:43:00');
SET @sh11 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh11, 'not smoke', 1, '2025-09-07 08:43:00', '2025-09-07 08:43:00');

-- DAY 12 (QUIT DATE) — 2025-09-08
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (68, 2, '2025-09-08 08:11:00', '2025-09-08 08:11:00');
SET @sh12 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh12, 'not smoke', 1, '2025-09-08 08:11:00', '2025-09-08 08:11:00');

-- BADGES
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (68, 2, '2025-08-25 11:36:11', '2025-08-25 11:36:11', '2025-08-25 11:36:11')
ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (68, 5, '2025-09-03 09:07:00', '2025-09-03 09:07:00', '2025-09-03 09:07:00')
ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (68, 4, '2025-09-08 08:11:00', '2025-09-08 08:11:00', '2025-09-08 08:11:00')
ON DUPLICATE KEY UPDATE updated_at = updated_at;
