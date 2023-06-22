import { toLinkText } from '../../common/utils.js';
import { Link } from 'react-router-dom';

const SubjectLink = ({ title, subtitle }) => {
  return (
    <Link
      to={`/${toLinkText(title)}`}
      style={{
        gridColumn: 'span 1',
        gridRow: 'span 1',

        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'space-evenly',

        border: '1px solid #333',
        padding: '0 20px'
      }}
    >
      <h2>{ title }</h2>
      <p>{ subtitle }</p>
    </Link>
  );
};


const Dashboard = () => {
  const subjects = require('../../../data/subjects_table.json');

  return (
    <div
      style={{
        display: 'grid',
        gridTemplateColumns: 'repeat(3, 1fr)',
        gridAutoRows: '100px',
        gap: '20px'
      }}>

        {subjects.map((subject) => {
          return <SubjectLink title={subject.title} subtitle={subject.subtitle} key={subject.id} />
        })}

    </div>
  );
};

export default Dashboard;