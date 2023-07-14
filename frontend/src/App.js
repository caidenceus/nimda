import LeftSidebar from './components/common/LeftSidebar.js';

import Dashboard from './components/pages/dashboard/Dashboard.js';
import Subject from './components/pages/subject/Subject.js';
import { toLinkText } from './components/common/utils.js';

import { Routes, Route } from "react-router-dom";
import { useState, useEffect } from 'react';


function App() {
  let [subjects, setSubjects] = useState([]);

  const getSubjects = async () => {
    let resp = await fetch('http://127.0.0.1:8000/api/subjects/');
    let data = await resp.json();
    setSubjects(data);
  }

  useEffect(() => {
    getSubjects();
  }, []);

  return (
    <div id="app" style={{ display: 'flex', height: '100%' }}>
      <LeftSidebar />

      <main className="content" style={{ width: "100%", padding: '20px' }}>
        <Routes>
          <Route path="/" element={<Dashboard />} />

          {/* Generate routes for all subjects in the Subjects Postgres table */}
          {subjects.map((subject) => {
            return (
              <Route
                path={`${toLinkText(subject.title)}`}
                element={<Subject title={subject.title} id={subject.id} />}
                key={`subject-${subject.id}`}
              >
                {/* Generate nested routes for all chapters of each subject */}
              </Route>
            );
          })}

        </Routes>
      </main>
    </div>
  );
}

export default App;
