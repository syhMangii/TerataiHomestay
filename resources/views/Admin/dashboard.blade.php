@include('Include.appadmin')

<style>
    :root {
        --card:      #FFFFFF;
        --ink:       #0B1220;
        --ink-2:     #4A5772;
        --ink-3:     #8893AB;
        --danger:    #E5484D;
        --danger-bg: #FFF1F1;
        --danger-bd: #F4B6B6;
        --good:      #2E9E6E;
    }

    .dash-title { margin: 0; font-size: 24px; font-weight: 700; letter-spacing: -0.02em; }
    .dash-title .accent { color: var(--orange); }
    .dash-sub { color: var(--on-dark-2); font-size: 13px; margin-top: 4px; }

    .kpi-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 14px; }
    .kpi-card {
        background: var(--card); color: var(--ink);
        border-radius: 14px; padding: 18px 20px 16px;
        border: 1px solid rgba(0,0,0,0.04);
        display: flex; flex-direction: column; gap: 6px; min-height: 120px;
    }
    .kpi-card.danger { background: var(--danger-bg); border-color: var(--danger-bd); }
    .kpi-label { font-size: 11px; font-weight: 600; letter-spacing: 0.10em; text-transform: uppercase; color: var(--ink-3); }
    .kpi-card.danger .kpi-label { color: #B5302A; }
    .kpi-value { font-size: 38px; font-weight: 700; letter-spacing: -0.02em; line-height: 1.05; }
    .kpi-foot  { font-size: 12px; color: var(--ink-2); margin-top: auto; }

    .md {
        display: grid;
        grid-template-columns: minmax(300px, 380px) 1fr;
        gap: 14px; min-height: 540px;
    }
    .panel {
        background: var(--card); color: var(--ink);
        border-radius: 14px; border: 1px solid rgba(0,0,0,0.04);
        display: flex; flex-direction: column; overflow: hidden;
    }
    .panel-head {
        padding: 16px 18px 14px; border-bottom: 1px solid #EEF0F4;
        display: flex; align-items: center; justify-content: space-between; gap: 10px;
    }
    .panel-head h3 { margin: 0; font-size: 14px; font-weight: 700; }
    .panel-head .sub { color: var(--ink-3); font-size: 12px; }
    .panel-head .hint { color: var(--ink-3); font-size: 11.5px; }

    .school-list { flex: 1; overflow-y: auto; }
    .school-row {
        display: grid; grid-template-columns: 1fr auto; align-items: center;
        padding: 14px 18px; border-bottom: 1px solid #F1F2F6;
        cursor: pointer; transition: background .12s; position: relative;
    }
    .school-row:last-child { border-bottom: 0; }
    .school-row:hover { background: #FAFBFD; }
    .school-row.active { background: #FFF6F1; }
    .school-row.active::before {
        content: ""; position: absolute; left: 0; top: 8px; bottom: 8px; width: 3px;
        background: var(--orange); border-radius: 0 3px 3px 0;
    }
    .school-name { font-weight: 600; font-size: 14px; color: var(--ink); }
    .school-meta { margin-top: 4px; display: flex; align-items: center; gap: 8px; font-size: 12px; color: var(--ink-3); }
    .dotsep { width: 3px; height: 3px; background: #C4C9D6; border-radius: 50%; display: inline-block; }

    .quitbar { width: 110px; display: flex; flex-direction: column; align-items: flex-end; gap: 6px; }
    .quitbar .pct { font-weight: 600; font-size: 13px; color: var(--ink); font-variant-numeric: tabular-nums; }
    .quitbar.warn .pct { color: var(--danger); }
    .quitbar.zero .pct { color: var(--ink-3); }
    .bar { width: 100px; height: 6px; background: #EFF1F6; border-radius: 999px; overflow: hidden; }
    .bar > i { display: block; height: 100%; background: var(--good); border-radius: inherit; }
    .quitbar.warn .bar > i { background: var(--danger); }
    .quitbar.mid  .bar > i { background: var(--orange); }
    .quitbar.zero .bar > i { background: #D6DBE6; width: 100% !important; opacity: .4; }

    /* Right detail panel */
    #detail-panel { position: relative; }
    .detail-head {
        padding: 16px 18px 14px; border-bottom: 1px solid #EEF0F4;
        display: flex; align-items: center; justify-content: space-between; gap: 12px;
    }
    .detail-head h3 { margin: 0; font-size: 16px; font-weight: 700; }
    .detail-head .meta { color: var(--ink-3); font-size: 12.5px; margin-top: 3px; }
    .detail-head .actions { display: flex; gap: 8px; flex: none; }
    .dbtn {
        font-size: 12.5px; font-weight: 600; border-radius: 9px; padding: 8px 12px;
        border: 1px solid #E6E8EE; color: var(--ink); background: #fff;
        display: inline-flex; align-items: center; gap: 6px; text-decoration: none;
    }
    .dbtn:hover { background: #F7F8FB; color: var(--ink); }
    .dbtn.primary { background: var(--ink); color: #fff; border-color: var(--ink); }
    .dbtn.primary:hover { background: #1A2438; color: #fff; }

    .users-scroll { flex: 1; overflow-y: auto; }
    table.utbl { width: 100%; border-collapse: collapse; }
    table.utbl thead th {
        text-align: left; font-size: 11px; font-weight: 600;
        letter-spacing: 0.08em; text-transform: uppercase; color: var(--ink-3);
        padding: 12px 18px; border-bottom: 1px solid #EEF0F4;
        background: #FBFBFD; position: sticky; top: 0; z-index: 1;
    }
    table.utbl tbody td {
        padding: 13px 18px; border-bottom: 1px solid #F2F3F7;
        font-size: 13.5px; vertical-align: middle;
    }
    table.utbl tbody tr:last-child td { border-bottom: 0; }
    table.utbl tbody tr:hover { background: #FAFBFD; }

    .user-cell { display: flex; align-items: center; gap: 12px; min-width: 0; }
    .av {
        width: 34px; height: 34px; border-radius: 50%;
        display: grid; place-items: center; font-weight: 600; font-size: 12px; flex: none;
    }
    .av-orange { background: #FFE3D2; color: #4A2716; }
    .av-teal   { background: #D2F4F1; color: #0E5C57; }
    .av-gray   { background: #E8EBF2; color: #4A5772; }
    .user-name { font-weight: 600; color: var(--ink); }
    .user-sub  { font-size: 12px; color: var(--ink-3); margin-top: 2px; }

    .badge {
        display: inline-flex; align-items: center; gap: 5px; padding: 3px 9px;
        border-radius: 999px; font-size: 11.5px; font-weight: 600; text-transform: lowercase;
    }
    .badge::before { content: ""; width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
    .badge-quit   { background: var(--danger-bg); color: var(--danger); border: 1px solid var(--danger-bd); }
    .badge-active { background: #ECF8F1; color: var(--good); border: 1px solid #BFE5CF; }

    .empty-panel { padding: 60px 24px; text-align: center; color: var(--ink-3); }
    .empty-icon { width: 56px; height: 56px; border-radius: 14px; background: #F1F3F8; display: grid; place-items: center; margin: 0 auto 14px; font-size: 22px; }
    .empty-panel h4 { color: var(--ink); margin: 0 0 6px; font-size: 15px; }

    .loading-panel { display: flex; align-items: center; justify-content: center; flex: 1; color: var(--ink-3); font-size: 13px; gap: 10px; }
    .spinner { width: 18px; height: 18px; border: 2px solid #E6E8EE; border-top-color: var(--ink-2); border-radius: 50%; animation: spin .7s linear infinite; }
    @keyframes spin { to { transform: rotate(360deg); } }

    .dash-foot { font-size: 12px; color: var(--on-dark-2); }

    @media (max-width: 1180px) { .kpi-grid { grid-template-columns: repeat(2,1fr); } .md { grid-template-columns: 1fr; } }
    @media (max-width: 640px)  { .kpi-grid { grid-template-columns: 1fr; } }
</style>

@php
    $activeUsers  = $totalUsers - $totalQuitUsers;
    $quitRate     = $totalUsers > 0 ? round(($totalQuitUsers / $totalUsers) * 100) : 0;
    $schoolCount  = $schools->count();
    $avgPerSchool = $schoolCount > 0 ? number_format($totalUsers / $schoolCount, 1) : '—';
@endphp

<div>
    <h1 class="dash-title">Dashboard — <span class="accent">{{ $clinicName }}</span></h1>
    <div class="dash-sub">Overview of patients enrolled in the school-based quit-smoking programme.</div>
</div>

<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-label">Total Users</div>
        <div class="kpi-value">{{ $totalUsers ?: '—' }}</div>
        <div class="kpi-foot">across {{ $schoolCount }} schools</div>
    </div>
    <div class="kpi-card danger">
        <div class="kpi-label">Quit Users</div>
        <div class="kpi-value">{{ $totalQuitUsers ?: '—' }}</div>
        <div class="kpi-foot">{{ $quitRate }}% overall quit rate</div>
    </div>
    <div class="kpi-card">
        <div class="kpi-label">Avg per School</div>
        <div class="kpi-value">{{ $avgPerSchool }}</div>
        <div class="kpi-foot">patients per school</div>
    </div>
</div>

<div class="md">

    {{-- LEFT: Schools list --}}
    <div class="panel">
        <div class="panel-head">
            <div>
                <h3>Schools</h3>
                <div class="sub">{{ $schoolCount }} schools · {{ $totalUsers }} enrolled</div>
            </div>
            <span class="hint">select a row →</span>
        </div>
        <div class="school-list">
            @forelse($schools as $school)
            @php
                $pct  = $school->users_count > 0 ? round(($school->quit_count / $school->users_count) * 100) : 0;
                $qCls = $pct >= 50 ? 'warn' : ($pct >= 20 ? 'mid' : ($pct === 0 ? 'zero' : ''));
            @endphp
            <div class="school-row {{ $loop->first ? 'active' : '' }}"
                 data-school-id="{{ $school->id }}"
                 data-url="{{ route('dashboard.school', $school->id) }}">
                <div>
                    <div class="school-name">{{ $school->name }}</div>
                    <div class="school-meta">
                        <span>{{ $school->users_count }} users</span>
                        <span class="dotsep"></span>
                        <span>{{ $school->quit_count }} quit</span>
                    </div>
                </div>
                <div class="quitbar {{ $qCls }}">
                    <div class="pct">{{ $pct }}%</div>
                    <div class="bar"><i style="width:{{ $pct === 0 ? 100 : $pct }}%"></i></div>
                </div>
            </div>
            @empty
            <div class="empty-panel">
                <div class="empty-icon">🏫</div>
                <h4>No schools found</h4>
            </div>
            @endforelse
        </div>
    </div>

    {{-- RIGHT: Detail panel (populated by JS) --}}
    <div class="panel" id="detail-panel">
        <div class="loading-panel" id="detail-loading">
            <div class="spinner"></div> Loading patients…
        </div>
    </div>

</div>

<div class="dash-foot">
    Last sync on page load · Data scope: patients under {{ $clinicName }} only · Records comply with PDPA 2010.
</div>

<script>
const addPatientUrl = "{{ route('admin.addUserForm') }}";
function renderDetail(data) {
    const s = data.school;
    const users = data.users;

    const panel = document.getElementById('detail-panel');
    panel.innerHTML = `
        <div class="detail-head">
            <div>
                <h3>${s.name}</h3>
                <div class="meta">${s.enrolled} enrolled · ${s.quit} quit · ${s.rate}% rate</div>
            </div>
            <div class="actions">
                <a href="${addPatientUrl}" class="dbtn primary">+ Add Patient</a>
            </div>
        </div>
<div class="users-scroll" id="users-scroll">
            ${users.length === 0 ? `
                <div class="empty-panel">
                    <div class="empty-icon">👤</div>
                    <h4>No patients in this school</h4>
                    <div>Add the first patient using the button above.</div>
                </div>` : `
                <table class="utbl">
                    <thead>
                        <tr>
                            <th style="width:38%">Patient</th>
                            <th>Status</th>
                            <th>Smoke-free days</th>
                            <th>Last check-in</th>
                            <th style="width:60px"></th>
                        </tr>
                    </thead>
                    <tbody id="users-tbody">
                        ${users.map(u => `
                        <tr data-status="${u.status}">
                            <td>
                                <div class="user-cell">
                                    <div class="av av-${u.color}">${u.initials}</div>
                                    <div>
                                        <div class="user-name">${u.username}</div>
                                        <div class="user-sub">${u.class_name || '—'} · Age ${u.age || '—'}</div>
                                    </div>
                                </div>
                            </td>
                            <td>${u.status === 'quit' ? '<span class="badge badge-quit">quit</span>' : ''}</td>
                            <td style="font-variant-numeric:tabular-nums;font-weight:500;color:var(--ink-3)">
                                ${u.smoke_free} days
                            </td>
                            <td style="font-variant-numeric:tabular-nums;color:var(--ink-2)">
                                ${u.last_checkin || '—'}
                            </td>
                            <td>
                                <a href="${u.detail_url}" style="font-size:12px;font-weight:600;color:var(--ink-2);text-decoration:none;padding:5px 8px;border-radius:7px;border:1px solid #E6E8EE;background:#fff;">
                                    View
                                </a>
                            </td>
                        </tr>`).join('')}
                    </tbody>
                </table>`}
        </div>`;
    currentFilter = 'all';
}

function loadSchool(row) {
    document.querySelectorAll('.school-row').forEach(r => r.classList.remove('active'));
    row.classList.add('active');

    document.getElementById('detail-panel').innerHTML =
        '<div class="loading-panel"><div class="spinner"></div> Loading patients…</div>';

    fetch(row.dataset.url, { headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
        .then(r => r.json())
        .then(data => renderDetail(data))
        .catch(() => {
            document.getElementById('detail-panel').innerHTML =
                '<div class="empty-panel"><h4>Failed to load patients</h4><div>Please refresh the page.</div></div>';
        });
}

// Wire up school rows
document.querySelectorAll('.school-row').forEach(row => {
    row.addEventListener('click', () => loadSchool(row));
});

// Auto-load the first school on page load
const firstRow = document.querySelector('.school-row');
if (firstRow) loadSchool(firstRow);
</script>

@include('Include.footer')
