-- ============================================================
-- Dummy data for user_id = 67 (satisvaran)
-- Last check-in: 2025-08-27 "not smoke" is_continous=1
-- Continue streak from 2025-08-28 to quit date 2025-09-05 (8 days)
-- Streak bonus at day 7 (2025-09-03), streak_count=1
-- ============================================================

UPDATE users SET is_read = 1 WHERE id = 67;

-- DAY 1 — 2025-08-28 (continuous count: 2)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-08-28 08:14:00', '2025-08-28 08:14:00');
SET @sh1 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh1, 'not smoke', 1, '2025-08-28 08:14:00', '2025-08-28 08:14:00');

-- DAY 2 — 2025-08-29 (continuous count: 3)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-08-29 09:33:00', '2025-08-29 09:33:00');
SET @sh2 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh2, 'not smoke', 1, '2025-08-29 09:33:00', '2025-08-29 09:33:00');

-- DAY 3 — 2025-08-30 (continuous count: 4)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-08-30 07:58:00', '2025-08-30 07:58:00');
SET @sh3 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh3, 'not smoke', 1, '2025-08-30 07:58:00', '2025-08-30 07:58:00');

-- DAY 4 — 2025-08-31 (continuous count: 5)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-08-31 10:11:00', '2025-08-31 10:11:00');
SET @sh4 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh4, 'not smoke', 1, '2025-08-31 10:11:00', '2025-08-31 10:11:00');

-- DAY 5 — 2025-09-01 (continuous count: 6)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-09-01 08:47:00', '2025-09-01 08:47:00');
SET @sh5 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh5, 'not smoke', 1, '2025-09-01 08:47:00', '2025-09-01 08:47:00');

-- DAY 6 — 2025-09-02 (continuous count: 7)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-09-02 09:22:00', '2025-09-02 09:22:00');
SET @sh6 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh6, 'not smoke', 1, '2025-09-02 09:22:00', '2025-09-02 09:22:00');

-- DAY 7 — 2025-09-03 (continuous count: 8 → STREAK BONUS, streak_count=1)
-- Note: counting from first ever check-in, 8 total continuous = first 7-multiple
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-09-03 08:05:00', '2025-09-03 08:05:00');
SET @sh7 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh7, 'not smoke', 1, '2025-09-03 08:05:00', '2025-09-03 08:05:00');
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-09-03 08:05:01', '2025-09-03 08:05:01');
SET @sh7b = LAST_INSERT_ID();
INSERT INTO streaks (score_history_id, streak_count, created_at, updated_at) VALUES (@sh7b, 1, '2025-09-03 08:05:01', '2025-09-03 08:05:01');

-- DAY 8 — 2025-09-04 (continuous count: 9)
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-09-04 09:44:00', '2025-09-04 09:44:00');
SET @sh8 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh8, 'not smoke', 1, '2025-09-04 09:44:00', '2025-09-04 09:44:00');

-- DAY 9 (QUIT DATE) — 2025-09-05
INSERT INTO score_histories (user_id, score, created_at, updated_at) VALUES (67, 2, '2025-09-05 08:30:00', '2025-09-05 08:30:00');
SET @sh9 = LAST_INSERT_ID();
INSERT INTO check_ins (score_history_id, action, is_continous, created_at, updated_at) VALUES (@sh9, 'not smoke', 1, '2025-09-05 08:30:00', '2025-09-05 08:30:00');

-- BADGES
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (67, 2, '2025-08-25 11:28:31', '2025-08-25 11:28:31', '2025-08-25 11:28:31')
ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (67, 5, '2025-09-03 08:05:00', '2025-09-03 08:05:00', '2025-09-03 08:05:00')
ON DUPLICATE KEY UPDATE updated_at = updated_at;
INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at) VALUES (67, 4, '2025-09-05 08:30:00', '2025-09-05 08:30:00', '2025-09-05 08:30:00')
ON DUPLICATE KEY UPDATE updated_at = updated_at;
