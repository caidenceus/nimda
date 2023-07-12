import LeftSidebar from './components/common/LeftSidebar.js';

import Dashboard from './components/pages/dashboard/Dashboard.js';
import Subject from './components/pages/subject/Subject.js';
import { toLinkText } from './components/common/utils.js';

import { Routes, Route } from "react-router-dom";


function App() {
  const subjects = require('./data/subjects_table.json');
  const chapters = require('./data/chapters_table.json');

  return (
    <div id="app" style={{ display: 'flex', height: '100%' }}>
      <LeftSidebar />
      <main className="content" style={{ width: "100%", padding: '20px' }}>
        <Routes>
          <Route path="/" element={<Dashboard />} />

          {/* Generate routes for all subjects in the Subjects Postgres table */}
          {subjects.map((subject) => {
            const subjectChapters = chapters.filter(chatperFilter);
            function chatperFilter(chapter) {
              return chapter.subject === subject.title;
            }

            return (
              <Route
                path={`${toLinkText(subject.title)}`}
                element={<Subject title={subject.title} />}
              >
                {/* Generate nested routes for all chapters of each subject */}
                {subjectChapters.map((chapter) => {
                  return (
                    <Route 
                      path={`${toLinkText(chapter.title)}`}
                      element={<p>Chapter</p>}
                    />
                  );
                })}
              </Route>
            );
          })}

        </Routes>
      </main>
    </div>
  );
}

export default App;
