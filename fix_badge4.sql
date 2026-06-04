-- ============================================================
-- Fix: Award badge #4 (active_on_quit_date) to all users who:
--   1. Have is_read = true
--   2. Have an active quit date
--   3. Have a "not smoke" + is_continous = 1 check-in on that quit date
--   4. Do NOT already have badge #4
-- ============================================================

INSERT INTO badge_user (user_id, badge_id, achieved_at, created_at, updated_at)
SELECT
    u.id                AS user_id,
    4                   AS badge_id,
    -- Pull the actual check-in time on the quit date as achieved_at
    (
        SELECT ci.created_at
        FROM quit_dates qd
        JOIN score_histories sh ON sh.user_id = u.id
        JOIN check_ins ci ON ci.score_history_id = sh.id
        WHERE qd.user_id = u.id
        AND qd.is_active = 1
        AND ci.action = 'not smoke'
        AND ci.is_continous = 1
        AND DATE(ci.created_at) = qd.quit_date
        LIMIT 1
    )                   AS achieved_at,
    NOW()               AS created_at,
    NOW()               AS updated_at
FROM users u

-- Must have read the flipchart
WHERE u.is_read = 1

-- Must have an active quit date
AND EXISTS (
    SELECT 1 FROM quit_dates qd
    WHERE qd.user_id = u.id
    AND qd.is_active = 1
)

-- Must have checked in "not smoke" (continuous) on their active quit date
AND EXISTS (
    SELECT 1
    FROM quit_dates qd
    JOIN score_histories sh ON sh.user_id = u.id
    JOIN check_ins ci ON ci.score_history_id = sh.id
    WHERE qd.user_id = u.id
    AND qd.is_active = 1
    AND ci.action = 'not smoke'
    AND ci.is_continous = 1
    AND DATE(ci.created_at) = qd.quit_date
)

-- Must NOT already have badge #4
AND NOT EXISTS (
    SELECT 1 FROM badge_user bu
    WHERE bu.user_id = u.id
    AND bu.badge_id = 4
);
