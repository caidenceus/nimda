import { toLinkText } from '../../common/utils.js';
import { Link } from 'react-router-dom';
import TopBar from './TopBar.js';

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

const Subject = ({ title }) => {
  const unfilteredChapters = require('../../../data/chapters_table.json');
  const chapters = unfilteredChapters.filter(filter);

  function filter(chapter) {
    return chapter.subject === title;
  }

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