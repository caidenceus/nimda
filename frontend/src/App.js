import LeftSidebar from './components/common/LeftSidebar.js';

import Dashboard from './components/pages/dashboard/Dashboard.js';
import Subject from './components/pages/subject/Subject.js';

import { Routes, Route } from "react-router-dom";


function App() {
  return (
    <div id="app" style={{ display: 'flex', height: '100%' }}>
      <LeftSidebar />
      <main className="content" style={{ width: "100%", padding: '20px' }}>
        <Routes>
          <Route path="/" element={<Dashboard />} />

          <Route path="/calculus-i" element={<Subject title="Calculus I" />} />
          <Route path="/calculus-ii" element={<Subject title="Calculus II" />} />
          <Route path="/calculus-iii" element={<Subject title="Calculus III" />} />
          <Route path="/number-theory" element={<Subject title="Number Theory" />} />
          <Route path="/linear-algebra" element={<Subject title="Linear Algebra" />} />
        </Routes>
      </main>
    </div>
  );
}

export default App;
