import { toLinkText } from '../../common/utils.js';
import { Link } from 'react-router-dom';
import TopBar from './TopBar.js';
import { useState, useEffect } from 'react';

const ChapterLink = ({ title, subject, subtitle }) => {
  return (
    <Link
      to={`/${toLinkText(subject)}/${toLinkText(title)}`}
      style={{
        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'space-evenly',

        border: '1px solid #333',
        padding: '20px',
        margin: '20px 0'
      }}
    >
      <h2>{ title }</h2>
      <p>{ subtitle }</p>
    </Link>
  );
};

const Subject = ({ title, id }) => {
  let [chapters, setChapterss] = useState([]);

  const getChapters = async () => {
    let resp = await fetch(`http://127.0.0.1:8000/api/subjects/${id}/chapters`);
    let data = await resp.json();
    setChapterss(data);
  }

  useEffect(() => {
    getChapters();
  }, []);

  return (
    <div>
      <TopBar />
      <h1>{ title }</h1>

      <div>
          {chapters.map((chapter) => {
            return (
              <ChapterLink
                title={chapter.title}
                subtitle={chapter.subtitle}
                subject={chapter.subject}
                key={chapter.id}
              />);
          })}
      </div>
    </div>
  );
};

export default Subject;