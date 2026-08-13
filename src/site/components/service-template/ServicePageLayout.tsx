import React from 'react';
import { ServicePageData } from '../../types/service';
import { ServiceHero } from './ServiceHero';
import { ServiceChallenges } from './ServiceChallenges';
import { ServiceSolution } from './ServiceSolution';
import { ServiceWhyChooseUs } from './ServiceWhyChooseUs';
import { ServiceFeatures } from './ServiceFeatures';
import { ServiceProcess } from './ServiceProcess';
import { ServiceTechStack } from './ServiceTechStack';
import { ServiceIndustries } from './ServiceIndustries';
import { ServiceCaseStudies } from './ServiceCaseStudies';
import { ServiceOutcomes } from './ServiceOutcomes';
import { ServiceComparison } from './ServiceComparison';
import { ServiceTestimonials } from './ServiceTestimonials';
import { ServiceFaq } from './ServiceFaq';
import { ServiceRelated } from './ServiceRelated';
import { ServiceCta } from './ServiceCta';

interface ServicePageLayoutProps {
  data: ServicePageData;
  onOpenConsultation: (topic?: string) => void;
}

export const ServicePageLayout: React.FC<ServicePageLayoutProps> = ({
  data,
  onOpenConsultation,
}) => {
  return (
    <div className="w-full bg-[#FEFEFE] text-[#153758] font-sans selection:bg-[#264868] selection:text-white">
      
      {/* 1. Hero */}
      <ServiceHero data={data.hero} {...(data.seo ? { seo: data.seo } : {})} onOpenConsultation={onOpenConsultation} />

      {/* 2. Business Challenges */}
      {data.challenges && <ServiceChallenges data={data.challenges} />}

      {/* 3. Our Solution */}
      {data.solution && <ServiceSolution data={data.solution} onOpenConsultation={onOpenConsultation} />}

      {/* 4. Why Choose This Service */}
      {data.whyChooseUs && <ServiceWhyChooseUs data={data.whyChooseUs} />}

      {/* 5. Features */}
      {data.features && <ServiceFeatures data={data.features} />}

      {/* 6. Development Process */}
      {data.process && <ServiceProcess data={data.process} />}

      {/* 7. Technology Stack */}
      {data.techStack && <ServiceTechStack data={data.techStack} />}

      {/* 8. Industries Served */}
      {data.industries && <ServiceIndustries data={data.industries} />}

      {/* 9. Case Studies */}
      {data.caseStudies && <ServiceCaseStudies data={data.caseStudies} onOpenConsultation={onOpenConsultation} />}

      {/* 10. Business Outcomes */}
      {data.outcomes && <ServiceOutcomes data={data.outcomes} />}

      {/* 11. Comparison Section */}
      {data.comparison && <ServiceComparison data={data.comparison} />}

      {/* 12. Testimonials */}
      {data.testimonials && <ServiceTestimonials data={data.testimonials} />}

      {/* 13. FAQ */}
      {data.faq && <ServiceFaq data={data.faq} />}

      {/* 14. Related Services */}
      {data.relatedServices && <ServiceRelated data={data.relatedServices} />}

      {/* 15. Final CTA */}
      {data.cta && <ServiceCta data={data.cta} onOpenConsultation={onOpenConsultation} />}

    </div>
  );
};
