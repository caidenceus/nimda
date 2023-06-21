import LeftSidebar from './components/common/LeftSidebar.js';

import Dashboard from './components/pages/dashboard/Dashboard.js';

import { Routes, Route } from "react-router-dom";


function App() {
  return (
    <div id="app" style={{ display: 'flex', height: '100%' }}>
      <LeftSidebar />
      <main className="content" style={{ width: "100%", padding: '20px' }}>
        <Routes>
          <Route path="/" element={<Dashboard />} />
        </Routes>
      </main>
    </div>
  );
}

export default App;
